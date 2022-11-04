<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        foreach($users as $user) {
            $business = new Business();
            $business->name = fake()->name();
            $business->description  = $user->name;
            $schedule = new Schedule();
            $business->schedule_id = $user->name;
        }
    }
}
