<?php

namespace App\Repositories;

use App\Enums\Transactions\Type;
use Illuminate\Database\Eloquent\Collection;

interface TransactionRepositoryInterface extends EloquentRepositoryInterface
{
    public function getByTimeInterval(int $modelId, $start, $end, Type $type = null);
}
