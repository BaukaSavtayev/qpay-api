<?php

namespace App\Actions\Business\Bonuses;
use App\Tasks as Tasks;

trait Bonuses
{


    /**
     * @param int $client_id
     * @param int $business_id
     * @return mixed
     */
    public function getBonuses($condition)
    {
        $this->updateBonusStatus($condition['client_id']);
        return app(Tasks\Bonuses\GetTask::class)->run($condition);
    }
    /***
     * @param $bonuses
     * @return array
     */
    public function getActiveBonuses($condition)
    {
        $bonuses = $this->getBonuses($condition);
        $active_bonuses = [];
        foreach ($bonuses as $bonus)
            if ($bonus->is_active) $active_bonuses[] = $bonus;
        return $active_bonuses;
    }

    /**
     * @param int $client_id
     * @return mixed
     */
    public function updateBonusStatus(int $client_id)
    {
        return app(Tasks\Bonuses\UpdateStatusTask::class)->run($client_id);
    }
}
