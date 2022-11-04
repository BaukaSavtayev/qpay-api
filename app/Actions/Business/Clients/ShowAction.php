<?php

namespace App\Actions\Business\Clients;

use App\Actions\Business\Bonuses\Bonuses;
use App\Contracts\Business\Clients\ShowOneClient;
use App\Models\Business;
use App\Models\Client;
use App\Tasks as Tasks;

class ShowAction implements ShowOneClient
{
    use Bonuses;
    public function execute(Business $business, Client $client): mixed
    {
        $bonuses = $this->getActiveBonuses([
            'business_id' => $business->id,
            'client_id' => $client->id,
        ]);
        $transactions = $this->getTransactions([
            ['userable_id', '=',     $business->id],
            ['recipient', '=', $client->id],
        ]);

        return [
            $client,
            'bonuses' => ['sum' => $this->sumOfBonuses($bonuses), $bonuses],
            'transactions' => $transactions,
        ];
    }
    public function getTransactions(array $condition)
    {
        return app(Tasks\Transactions\GetTask::class)->run($condition);
    }
    public function sumOfBonuses($bonuses)
    {
        $sum = 0;
        foreach ($bonuses as $bonus)
            if ($bonus->is_active) $sum += $bonus->amount;
        return $sum;
    }

}
