<?php

namespace App\Contracts\Transaction;

use Illuminate\Database\Eloquent\Collection;

interface GetAllTransactions
{
    public function execute($model, array $time_interval): Collection;
}
