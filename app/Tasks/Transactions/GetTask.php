<?php

namespace App\Tasks\Transactions;

use App\Repositories\TransactionRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class GetTask
{
    private TransactionRepositoryInterface $repository;

    public function __construct(TransactionRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $condition): Collection
    {
        return $this->repository->getWhere($condition);
    }
}
