<?php

namespace App\Actions\Business\Dashboard\CustomerChurn;

use App\Actions\Business\Dashboard\DashBoardAction;
use App\Models\Business;
use Carbon\Carbon;

class GetAction extends DashBoardAction implements \App\Contracts\Business\Dashboard\GetCustomerChurn
{

    public function execute(Business $business)
    {
        $clients = $this->getClients($business);
        $churnClients = [];
        foreach ($clients as $client){
            $created_at = $client->transactions[count($client->transactions )-1]->created_at;
            if ($created_at->lessThan(Carbon::today()->subDays(30)))
                $churnClients[] = $client;
        }
        return [count($churnClients), $churnClients];
    }
}
