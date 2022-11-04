<?php

namespace App\Actions\Business\Dashboard\RepeatedSales;

use App\Actions\Business\Dashboard\DashBoardAction;
use App\Models\Business;

class GetAction extends DashBoardAction implements \App\Contracts\Business\Dashboard\GetRepeatedSales
{

    public function execute(Business $business, array $time_interval)
    {
        $transactions = $this->filterByTimeInterval($this->getTransactions($business), $time_interval['start'], $time_interval['end']);
        return $this->sortByRepeated($transactions);
    }
    public function sortByRepeated(array $transactions)
    {
        $user_transactions = [];
        foreach ($transactions as $transaction){
            $user_transactions[$transaction->recipient][] = $transaction;
        }
        $repeated_transactions = [];
        foreach ($user_transactions as $user_transaction){
            if (array_key_exists(count($user_transaction), $repeated_transactions))
                $repeated_transactions[count($user_transaction)]++;
            else
                $repeated_transactions[count($user_transaction)] = 1;
        }
        return $repeated_transactions;
    }
}
