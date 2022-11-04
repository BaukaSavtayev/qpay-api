<?php

namespace App\Actions\Business\Dashboard\SalesDynamics;

use App\Actions\Business\Dashboard\DashBoardAction;
use App\Models\Business;
use Carbon\Carbon;

class GetAction extends DashBoardAction implements \App\Contracts\Business\Dashboard\GetSalesDynamics
{

    public function execute(Business $business, array $time_interval): array
    {
        $transactions = $this->filterByTimeInterval($this->getTransactions($business), $time_interval['start'], $time_interval['end']);
        return $transactions;
    }
}
