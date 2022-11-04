<?php

namespace App\Actions\Client\Partners;

use App\Actions\Business\Bonuses\Bonuses;
use App\Models\Business;
use App\Models\Client;
use App\Tasks as Tasks;

class GetOneAction implements \App\Contracts\Client\Partners\GetPartner
{
    use Bonuses;
    public function execute(Client $client, Business $business)
    {
        $this->updateBonusStatus($client->id);
        $bonuses = $this->getBonuses(['client_id' => $client->id, 'business_id' => $business->id]);

        $business = app(Tasks\Business\GetTask::class)->run(['id' => $business->id], [
            'city','contacts','categories','bonuses_setting','schedule'
        ]);
        if (!count($bonuses)){
            return ['success' => false, 'message' => 'Активных бонусов этого парнера не найденл'];
        }
        $sum = 0;
        $future_accruals = [];
        $active_bonuses = [];
        foreach ($bonuses as $bonus)
            if ($bonus->is_active) {
                $active_bonuses[] = $bonus;
                $sum += $bonus->amount;
            }
            else $future_accruals[] = $bonus;

        return [
            $business,
            'bonuses' => ['sum' => $sum,$active_bonuses],
            'Future accruals' => $future_accruals
        ];

    }
}
