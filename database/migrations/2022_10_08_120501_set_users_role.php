<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $users = \App\Models\User::all();
        $i = 0;
        foreach ($users as $user){
            $i++;
            if (fmod($i, 7))
                $user->assignRole('Client');
            else
                $user->assignRole('Business');
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $users = \App\Models\User::all();
        $i = 0;
        foreach ($users as $user){
            $i++;
            if (fmod($i, 7))
                $user->removeRole('Client');
            else
                $user->removeRole('Business');
        }
    }
};
