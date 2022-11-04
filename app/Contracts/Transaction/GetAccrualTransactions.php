<?php

namespace App\Contracts\Transaction;

use Illuminate\Database\Eloquent\Collection;

interface GetAccrualTransactions
{
    public function execute($model, array $time_interval): Collection;
}
