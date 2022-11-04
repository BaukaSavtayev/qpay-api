<?php

namespace App\Actions\Business\Employee;

use App\Contracts\Business\Employee\UpdateEmployee;
use App\Dto\Business\Employee\UpdateDto;
use App\Models\Employee;
use App\Models\User;
use App\Tasks as Tasks;
use Illuminate\Support\Facades\DB;


class UpdateAction implements UpdateEmployee
{
    public function execute(Employee $employee, UpdateDto $dto): mixed
    {

        $res = DB::transaction(function () use ($employee, $dto){
            $user = $this->updateUser($employee->user, ['name' => $dto->name]);
            $this->updatePermissions($employee->user, $dto->permissions);
            $employee = $this->updateEmployee($employee, $dto->toArray());
            return $employee && $user;
        });
        if (!$res) return [
            'success' => false,
            'message' => 'ошибка при сохранении'
        ];
        return [$employee,$employee->user];
    }

    public function updateUser(User $user, array $payload): bool
    {
        return app(Tasks\User\UpdateTask::class)->run($user, $payload);
    }
    public function updateEmployee(Employee $employee, array $payload): bool
    {
        return app(Tasks\Employee\UpdateTask::class)->run($employee, $payload);
    }
    public function updatePermissions(User $user, array $permissions): bool
    {
        return app(Tasks\User\Permissions\UpdateTask::class)->run($user, $permissions);
    }
}
