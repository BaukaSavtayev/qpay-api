<?php

namespace App\Actions\Transaction\Withdrawal;

use App\Contracts\Transaction\GetWithdrawalTransactions;
use App\Enums\Transactions\Type;
use App\Tasks\Transactions\GetByTimeIntervalTask;
use Illuminate\Database\Eloquent\Collection;

class GetAction implements GetWithdrawalTransactions
{
    public function execute($model, array $time_interval): Collection
    {
        return app(GetByTimeIntervalTask::class)->run($model->id, $time_interval, Type::WITHDRAWAL());
    }
}
