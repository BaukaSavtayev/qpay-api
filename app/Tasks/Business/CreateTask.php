<?php

namespace App\Tasks\Business;

use App\Repositories\BusinessRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CreateTask
{
    private BusinessRepositoryInterface $repository;

    public function __construct(BusinessRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $payload): Model
    {
        return $this->repository->create($payload);
    }
}
