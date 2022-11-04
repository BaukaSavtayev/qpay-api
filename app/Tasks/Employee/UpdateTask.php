<?php

namespace App\Tasks\Employee;

use App\Models\Employee;
use App\Repositories\EmployeeRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class UpdateTask
{
    private EmployeeRepositoryInterface $repository;

    public function __construct(EmployeeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function run(Employee $employee, array $payload): bool
    {
        return $employee->update($payload);
    }
}
