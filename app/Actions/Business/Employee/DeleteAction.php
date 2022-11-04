<?php

namespace App\Actions\Business\Employee;
use App\Contracts\Business\Employee\DeleteEmployee;
use App\Models\Business;
use App\Models\Employee;
use App\Models\User;
use App\Tasks as Tasks;
use Illuminate\Support\Facades\DB;

class DeleteAction implements DeleteEmployee
{
    public function execute(Business $business, Employee $employee): mixed
    {

        $res = DB::transaction(function () use ($employee){
            return $this->deleteEmployee($employee)
                && $this->deleteUser($employee->user)
                && $this->removeRole($employee->user, 'Employee');
        });
        if ($res) {
            return [
                'success' => true,
                'message' => 'Сотрудник удален'
            ];
        }
        return [
            'success' => false,
            'message' => 'Ошибка при удалении сотрудника'
        ];
    }

    public function deleteEmployee(Employee $employee): bool
    {
        return app(Tasks\Employee\DeleteTask::class)->run($employee->id);
    }

    public function deleteUser(User $user)
    {
        return app(Tasks\User\DeleteTask::class)->run($user->id);
    }

    public function removeRole(User $user, string $role)
    {
        return app(Tasks\Role\RoleRemoveTask::class)->run($user, 'Employee');
    }
}
