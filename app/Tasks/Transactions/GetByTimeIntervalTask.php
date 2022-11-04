<?php

namespace App\Tasks\Transactions;

use App\Enums\Transactions\Type;
use App\Repositories\TransactionRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class GetByTimeIntervalTask
{
    private TransactionRepositoryInterface $repository;

    public function __construct(TransactionRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function run(int $modelID, array $time_interval, Type $type = null): Collection
    {
        return $this->repository->getByTimeInterval($modelID, $time_interval['start'], $time_interval['end'], $type);
    }
}
