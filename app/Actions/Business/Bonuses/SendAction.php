<?php

namespace App\Actions\Business\Bonuses;

use App\Dto\Business\Bonuses\AccrualDto;
use App\Enums as Enums;
use App\Models\Business;
use App\Models\Partner;
use App\Models\Transaction;
use App\Tasks as Tasks;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SendAction implements \App\Contracts\Business\Bonuses\SendBonus
{

    public function execute(Business $business, AccrualDto $dto): mixed
    {

        $client = $this->findClientBuPhoneNumber($dto->client_phone_number);
        $res = DB::transaction(function () use ($business, $dto, $client){
            if ($business->account < $dto->purchase_amount * $dto->bonus_size / 100){
                return ['success' => false, 'message' => 'Недостаточно средств на счету'];
            }
            $transaction = $this->createAccrualTransaction($dto, $client->userable->id, $business->id);
            $partners = $this->createOrFindPartnerRelates($business->id, $client->userable->id);
            $bonus = $this->createBonuses($dto, $client->userable->id, $business);

            if ($transaction && $bonus && $partners)
                return ['success' => true, 'message' => 'Бонусы успешно отправлены'];
            else
                return ['success' => false, 'message' => 'Произоошла ошибка'];
        });

        return $res;
    }

    public function findClientBuPhoneNumber(int $phone_number): mixed
    {
        return app(Tasks\Client\FindByPhoneNumberTask::class)->run($phone_number);
    }

    public function createAccrualTransaction(AccrualDto $dto, int $client_id, int $business_id): Transaction
    {
        $transaction_params = [
            'bonus_amount' => $dto->purchase_amount * $dto->bonus_size / 100,
            'userable_id' => $business_id,
            'recipient' => $client_id,
            'status' => Enums\Transactions\Status::IN_PROCESSING(),
            'tr_type' => Enums\Transactions\Type::ACCRUAL()
        ];
        return app(Tasks\Transactions\CreateTask::class)->run($dto->toArray() + $transaction_params);
    }

    public function createOrFindPartnerRelates(int $business_id, int $client_id): Partner
    {
        return app(Tasks\Partner\CreateTask::class)->run(['business_id' => $business_id, 'client_id' => $client_id]);
    }

    public function createBonuses(AccrualDto $dto, int $client_id, Business $business)
    {
        $bonuses_setting = $business->bonuses_setting;
        if (!$bonuses_setting){
            die (json_encode(['success' => false, 'message' => 'Have not bonuses settings']));
        }
        $activation_start = $bonuses_setting->activation_start;
        $deactivation_start = $activation_start + $bonuses_setting->deactivation_start;
        $payload = [
            'amount' => $dto->purchase_amount  * $dto->bonus_size / 100,
            'business_id' => $business->id,
            'client_id' => $client_id,
            'is_active' => !$activation_start ? Enums\Bonuses\Status::ACTIVE(): Enums\Bonuses\Status::INACTIVE(),
            'activation_start' => Carbon::now()->addHours($activation_start),
            'deactivation_start' => Carbon::now()->addHours($deactivation_start)
        ];

        return app(Tasks\Bonuses\CreateTask::class)->run($dto->toArray() + $payload);
    }
}
