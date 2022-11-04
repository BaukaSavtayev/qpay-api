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
        Schema::table('schedule', function (Blueprint $table) {
            $table->char('monday', 11)->nullable()->change();
            $table->char('tuesday', 11)->nullable()->change();
            $table->char('wednesday', 11)->nullable()->change();
            $table->char('thursday', 11)->nullable()->change();
            $table->char('friday', 11)->nullable()->change();
            $table->char('saturday', 11)->nullable()->change();
            $table->char('sunday', 11)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schedule', function (Blueprint $table) {
            $table->char('monday', 11)->nullable(false)->change();
            $table->char('tuesday', 11)->nullable(false)->change();
            $table->char('wednesday', 11)->nullable(false)->change();
            $table->char('thursday', 11)->nullable(false)->change();
            $table->char('friday', 11)->nullable(false)->change();
            $table->char('saturday', 11)->nullable(false)->change();
            $table->char('sunday', 11)->nullable(false)->change();
        });
    }
};
