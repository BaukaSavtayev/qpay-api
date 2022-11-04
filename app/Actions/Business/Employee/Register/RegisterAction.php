<?php

namespace App\Actions\Business\Employee\Register;

use App\Contracts\Business\Employee\Register\RegisterEmployee;
use App\Dto\Business\Employee\CreateDto;
use App\Models\Business;
use App\Models\Employee;
use App\Models\User;
use App\Tasks as Tasks;
use Illuminate\Support\Facades\DB;


class RegisterAction implements RegisterEmployee
{
    public function execute(CreateDto $dto): mixed
    {
        $business_user = auth()->user();
        if ($business_user->userable_type != Business::class)
            $business_id = $business_user->userable->business_id;
        else
            $business_id = $business_user->userable_id;

        $res = DB::transaction(function () use ($dto, $business_id) {

            $employee = $this->createEmployee($dto->toArray() + ['business_id' => $business_id]);
            $user = $this->createUser($dto->toArray() + ['userable_id' => $employee->id, 'userable_type' => Employee::class]);
            $permissions = $this->setPermissions($user, $dto->permissions);
            app(Tasks\Role\RoleSignTask::class)->run($user, 'Employee');

            return $employee && $user && $permissions;
        });
        if ($res)
        {
            return [
                'success' => true,
                'message' => 'Сотрудник успешно создан'
            ];
        }
        return [
            'success' => false,
            'message' => 'Ошибка при создании сотрудника'
        ];
    }

    public function createEmployee(array $payload): Employee
    {
        return app(Tasks\Employee\CreateTask::class)->run($payload);
    }

    public function createUser(array $payload): User
    {
        return app(Tasks\User\CreateTask::class)->run($payload);
    }

    public function setPermissions(User $user, array $permissions)
    {
        return app(Tasks\User\Permissions\UpdateTask::class)->run($user, $permissions);
    }

}
