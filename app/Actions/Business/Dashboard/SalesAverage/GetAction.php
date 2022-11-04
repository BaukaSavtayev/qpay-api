<?php

namespace App\Actions\Business\Dashboard\SalesAverage;

use App\Actions\Business\Dashboard\DashBoardAction;
use App\Models\Business;

class GetAction extends DashBoardAction implements \App\Contracts\Business\Dashboard\GetSalesAverage
{

    public function execute(Business $business, array $time_interval)
    {
        $transactions = $this->filterByTimeInterval($this->getTransactions($business), $time_interval['start'], $time_interval['end']);
        return [
            'average' => $this->getAverage($transactions),
            'transactions' => $transactions
        ];
    }

    public function getAverage($transactions)
    {
        $total = 0;
        foreach ($transactions as $transaction)
            $total += $transaction->purchase_amount;
        return round($total/count($transactions));
    }
}
