<?php

namespace App\Tasks\Employee;


use App\Repositories\EmployeeRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CreateTask
{
    private EmployeeRepositoryInterface $repository;

    public function __construct(EmployeeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $payload): Model
    {
        return $this->repository->create($payload);
    }
}
