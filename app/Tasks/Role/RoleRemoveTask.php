<?php

namespace App\Tasks\Role;

use App\Models\User;

class RoleRemoveTask
{
    public function run(User $model, string $role_name)
    {
        return $model->removeRole($role_name);
    }
}
