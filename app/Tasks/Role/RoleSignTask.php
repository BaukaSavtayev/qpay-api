<?php

namespace App\Tasks\Role;

use App\Models\User;

class RoleSignTask
{
    public function run(User $model, string $role_name)
    {
        return $model->assignRole($role_name);
    }
}
