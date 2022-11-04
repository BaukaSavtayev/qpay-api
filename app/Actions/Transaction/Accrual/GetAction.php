<?php

namespace App\Actions\Transaction\Accrual;

use App\Contracts\Transaction\GetAccrualTransactions;
use App\Enums\Transactions\Type;
use App\Tasks\Transactions\GetByTimeIntervalTask;
use Illuminate\Database\Eloquent\Collection;

class GetAction implements GetAccrualTransactions
{
    public function execute($model, array $time_interval): Collection
    {
        return app(GetByTimeIntervalTask::class)->run($model->id, $time_interval, Type::ACCRUAL());
    }
}
