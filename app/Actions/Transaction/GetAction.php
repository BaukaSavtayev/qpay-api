<?php

namespace App\Actions\Transaction;

use App\Contracts\Transaction\GetAllTransactions;
use App\Enums\Transactions\Type;
use App\Models\Transaction;
use App\Tasks\Transactions\GetByTimeIntervalTask;
use Illuminate\Database\Eloquent\Collection;

class GetAction implements GetAllTransactions
{
    public function execute($model, array $time_interval): Collection
    {
        $transactions = app(GetByTimeIntervalTask::class)->run($model->id, $time_interval);
        $accrual_transactions = [];
        $withdrawal_transactions = [];
        foreach ($transactions as $transaction)
        {
            if($transaction->tr_type == Type::ACCRUAL()->value)
                $accrual_transactions[] = $transaction;
            else
                $withdrawal_transactions[] = $transaction;
        }
        $transactions['total_count'] = count($transactions);
        $transactions['accrual_count'] = count($accrual_transactions);
        $transactions['withdrawal_count'] = count($withdrawal_transactions);
        return $transactions;
    }
}
