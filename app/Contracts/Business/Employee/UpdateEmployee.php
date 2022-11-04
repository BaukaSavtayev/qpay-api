<?php

namespace App\Contracts\Business\Employee;

use App\Dto\Business\Employee\UpdateDto;
use App\Models\Employee;

interface UpdateEmployee
{
    public function execute(Employee $employee, UpdateDto $dto): mixed;
}
