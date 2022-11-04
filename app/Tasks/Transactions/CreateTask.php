<?php

namespace App\Tasks\Transactions;

use App\Repositories\Eloquent\TransactionRepository;
use Illuminate\Database\Eloquent\Model;

class CreateTask
{
    private TransactionRepository $repository;

    public function __construct(TransactionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $payload): Model
    {
        return $this->repository->create($payload);
    }
}
