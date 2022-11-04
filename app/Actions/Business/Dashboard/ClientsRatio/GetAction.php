<?php

namespace App\Actions\Business\Dashboard\ClientsRatio;

use App\Actions\Business\Dashboard\DashBoardAction;
use App\Models\Business;
use Carbon\Carbon;

class GetAction extends DashBoardAction implements \App\Contracts\Business\Dashboard\GetClientsRatio
{

    public function execute(Business $business): array
    {
        $all_clients = $this->getClients($business);
        $all_clients_count = 0;
        $new_clients = [];
        $regular_clients = [];
        $other_clients = [];
        /**
         * last 30 days sales
         */
        foreach ($all_clients as $client)
        {
            $transaction_count = count($client->transactions);
            $created_at = $client->transactions[$transaction_count-1]->created_at;
            $term = Carbon::today()->subDay(30);
            if ($created_at->greaterThan($term))
            {
                $all_clients_count++;
                if ($transaction_count == 1)
                {
                    $new_clients[] = $client;
                }
                elseif ($transaction_count == 2 && $client->transactions[$transaction_count-2]->created_at->lessThan($term))
                {
                    $other_clients[] = $client;
                }
                else
                {
                    $regular_clients[] = $client;
                }
            }
        }

        return [
            'all_last_month_clients_count' => $all_clients_count,
            'new_clients' => [
                'count' => count($new_clients)/$all_clients_count*100,
                'clients' => $new_clients
            ],
            'regular_clients' => [
                'count' => count($regular_clients)/$all_clients_count*100,
                'clients' => $regular_clients
            ],
            'other_clients' => [
                'count' => count($other_clients)/$all_clients_count*100,
                'clients' => $other_clients
            ],
            ];
    }
}
