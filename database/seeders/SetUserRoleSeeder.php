<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SetUserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i=0;
        foreach (User::all() as $user) {
            if (!fmod($i, 6))
                $user->assignRole('Business');
            else
                $user->assignRole('Client');
            $i++;
        }
    }
}
