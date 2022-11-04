<?php

namespace App\Tasks\User\Permissions;


use App\Models\User;

class UpdateTask
{
    public function run(User $user, array $permissions)
    {
        foreach ($permissions as $permission => $value)
        {
            if ($value) $user->givePermissionTo($permission);
            else $user->revokePermissionTo($permission);
        }
        return true;
    }
}
