<?php

namespace App\Tasks\Employee;

use App\Repositories\EmployeeRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class DeleteTask
{
    private EmployeeRepositoryInterface $repository;

    public function __construct(EmployeeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function run(int $employee_id): bool
    {
        return $this->repository->delete($employee_id);
    }
}
