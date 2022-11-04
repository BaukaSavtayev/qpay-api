<?php

namespace App\Http\Controllers\Business\Employee;

use App\Dto\Business\Employee\ForEmployee\UpdateDtoFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Business\Employee\ShortUpdateRequest;
use App\Models\Business;
use App\Models\Employee;

class EmployeeController extends Controller
{

    public function update(Business $business, Employee $employee, ShortUpdateRequest $request): mixed
    {
        $dto = UpdateDtoFactory::fromRequest($request);
        $employee->user->name = $dto->name;
        $employee->user->phone_number = $dto->phone_number;
        $employee->user->save();
        return $employee;
    }

}
