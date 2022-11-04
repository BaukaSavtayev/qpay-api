<?php

namespace App\Actions\Business\Bonuses;

use App\Dto\Business\Bonuses\WithdrawalDto;
use App\Enums as Enums;
use App\Models\Bonus;
use App\Models\Business;
use App\Models\Transaction;
use App\Tasks as Tasks;
use Illuminate\Support\Facades\DB;

class Withdrawal implements \App\Contracts\Business\Bonuses\WithdrawalBonuses
{
    use Bonuses;
    public function execute(Business $business, WithdrawalDto $dto): mixed
    {

        $client = $this->findUserByPhoneNumber($dto->phone_number)->userable;
        $bonuses = $this->getActiveBonuses(['client_id' => $client->id, 'business_id' => $business->id]);

        if (!$bonuses)
            return ['success' => false, 'message' => 'Активных бонусов этого клиента не найдено'];


        $res = DB::transaction(function () use ($bonuses, $dto, $client, $business){
            $transaction = $this->createWithdrawalTransaction($dto, $client->id, $business->id);
            $calc = $this->calculate($bonuses, $dto->bonus_amount, $client->id);

            if ($transaction && $calc['success'])
                return ['success' => true, 'message' => 'Бонусы успешно списаны'];
            else
                return ['success' => false, 'message' => $calc['message']];
        });


        return $res;

    }
    public function findUserByPhoneNumber(int $phone_number): mixed
    {
        return app(Tasks\Client\FindByPhoneNumberTask::class)->run($phone_number);
    }
    public function deleteBonus($bonus_id)
    {
        app(Tasks\Bonuses\DeleteTask::class)->run($bonus_id);
    }

    public function updateBonus(Bonus $bonus, array $payload)
    {
        app(Tasks\Bonuses\UpdateTask::class)->run($bonus, $payload);
    }
    public function createWithdrawalTransaction(WithdrawalDto $dto, int $client_id, int $business_id): Transaction
    {
        $transaction_params = [
            'purchase_amount' => 0,
            'bonus_size' => 0,
            'userable_id' => $business_id,
            'recipient' => $client_id,
            'status' => Enums\Transactions\Status::IN_PROCESSING(),
            'tr_type' => Enums\Transactions\Type::WITHDRAWAL(),
        ];
        return app(Tasks\Transactions\CreateTask::class)->run($dto->toArray() + $transaction_params);
    }

    public function calculate($bonuses, $withdrawal_amount, $client_id)
    {
        $bonuses_sum = 0;

        foreach ($bonuses as $bonus)
            $bonuses_sum += $bonus->amount;

        if ($bonuses_sum < $withdrawal_amount)
        {
            return ['success' => false, 'message' => 'У клиента не достаточно бонусов'];
        }
        elseif ($bonuses_sum == $withdrawal_amount)
        {
            $is_update = Bonus::where('client_id', $client_id)->update(['is_active' => 0,'amount' => 0,'deactivation_start' => now()]);
            if (!$is_update){
                return ['success' => false, 'message' => 'У клиента не достаточно бонусов'];
            }

        }
        else
        {
            foreach ($bonuses as $bonus)
            {
                if ($bonus->amount < $withdrawal_amount)
                {
                    $withdrawal_amount = $withdrawal_amount - $bonus->amount;
                    $this->deleteBonus($bonus->id);
                }
                elseif ($bonus->amount > $withdrawal_amount)
                {
                    $this->updateBonus($bonus, ['amount' => $bonus->amount - $withdrawal_amount]);
                    break;
                }
                elseif($bonus->amount == $withdrawal_amount)
                {
                    $this->deleteBonus($bonus->id);
                    break;
                }

            }
        }
        return [
            'success' => true
        ];

    }


}
