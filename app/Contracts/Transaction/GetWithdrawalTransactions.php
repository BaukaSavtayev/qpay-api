<?php

namespace App\Contracts\Transaction;

use Illuminate\Database\Eloquent\Collection;

interface GetWithdrawalTransactions
{
    public function execute($model, array $time_interval): Collection;
}
