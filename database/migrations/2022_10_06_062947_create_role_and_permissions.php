<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $adminRole = Role::create(['name' => 'Super-Admin']);
        $businessRole = Role::create(['name' => 'Business']);
        $clientRole = Role::create(['name' => 'Client']);
        $developerRole = Role::create(['name' => 'Developer']);
        $EmployeeRole = Role::create(['name' => 'Employee']);

        Permission::create(['name' => 'create-users']);
        Permission::create(['name' => 'edit-users']);
        Permission::create(['name' => 'delete-users']);

        Permission::create(['name' => 'top-up-account']);
        Permission::create(['name' => 'accrual-bonuses']);
        Permission::create(['name' => 'withdrawal-bonuses']);
        Permission::create(['name' => 'check-account']);
        Permission::create(['name' => 'check-statistics']);
        Permission::create(['name' => 'change-bonuses-size']);
        Permission::create(['name' => 'add-employee']);
        Permission::create(['name' => 'check-clients-list']);
        Permission::create(['name' => 'profile-setup']);

        $adminRole->givePermissionTo([
            'create-users',
            'edit-users',
            'delete-users',
//            'top-up-account',
//            'send-bonuses',
//            'check-account',
        ]);

        $businessRole->givePermissionTo([
            'profile-setup',
            'top-up-account',
            'accrual-bonuses',
            'withdrawal-bonuses',
            'check-account',
            'check-statistics',
            'add-employee',
            'check-clients-list',
        ]);
        //$EmployeeRole->givePermissionTo([]);
        //$clientRole->givePermissionTo([]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_and_permissions');
    }
};
