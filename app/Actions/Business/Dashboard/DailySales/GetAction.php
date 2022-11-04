<?php

namespace App\Actions\Business\Dashboard\DailySales;
use App\Actions\Business\Dashboard\DashBoardAction;

use App\Models\Business;
use Carbon\Carbon;
use App\Tasks as Tasks;

class GetAction extends DashBoardAction implements \App\Contracts\Business\Dashboard\GetDailySales
{

    public function execute(Business $business, array $time_interval)
    {
        $transactions = $this->filterByTimeInterval($this->getTransactions($business), $time_interval['start'], $time_interval['end']);
        return $this->sortByDay($transactions);
    }

    public function sortByDay(array $models): array
    {
        $sorted_array = [];
        foreach ($models as $model){
            $day = substr(Carbon::parse(substr($model->created_at, 0, 10), 'UTC')->toDateTimeString(), 0, 10    );
            $sorted_array[$day][] = $model;
        }
        return $sorted_array;
    }
}
