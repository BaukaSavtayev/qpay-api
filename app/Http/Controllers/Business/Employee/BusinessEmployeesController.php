<?php

namespace App\Http\Controllers\Business\Employee;

use App\Dto\Business\Employee\CreateDtoFactory;
use App\Dto\Business\Employee\UpdateDtoFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Business\Employee\CreateRequest;
use App\Http\Requests\Business\Employee\UpdateRequest;
use App\Models\Business;
use App\Models\Employee;
use App\Http\Resources\Business\Employee\EmployeeCollection;
use App\Http\Resources\Business\Employee\ShowResource;


class BusinessEmployeesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Business','IsBusinessOwner'])->only(['index','delete','update']);
        $this->middleware(['can:add-employee','isBusinessEmployeeOrOwner'])->only(['store']);
        $this->middleware(['isBusinessEmployeeOrOwner','IsTrueEmployee'])->only(['show']);
    }
    /**
     * Display a listing of the resource.
     * @param Business $business
     * @return EmployeeCollection
     */
    public function index(Business $business): EmployeeCollection
    {
        return new EmployeeCollection($business->employees);
    }

    /**
     * @param CreateRequest $request
     * @return mixed
     */
    public function store(CreateRequest $request): mixed
    {
        return app(\App\Contracts\Business\Employee\Register\RegisterEmployee::class)->execute(
            CreateDtoFactory::fromRequest($request)
        );
    }

    /**
     * @param Business $business
     * @param Employee $employee
     * @return ShowResource
     */
    public function show(Business $business, Employee $employee): ShowResource
    {
        return new ShowResource($employee);
    }


    /**
     * @param Business $business
     * @param Employee $employee
     * @param UpdateRequest $request
     * @return mixed
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function update(Business $business, Employee $employee, UpdateRequest $request): mixed
    {
        return app(\App\Contracts\Business\Employee\UpdateEmployee::class)->execute($employee,
            UpdateDtoFactory::fromRequest($request)
        );
    }

    /**
     * @param Business $business
     * @param Employee $employee
     * @return mixed
     */
    public function destroy(Business $business, Employee $employee): mixed
    {
        return app(\App\Contracts\Business\Employee\DeleteEmployee::class)->execute($business, $employee);
    }
}
