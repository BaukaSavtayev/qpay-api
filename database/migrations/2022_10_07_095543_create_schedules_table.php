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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->unique()->onDelete('cascade')->constrained('Businesses');
            $table->char('monday', 11)->nullable();
            $table->char('tuesday', 11)->nullable();
            $table->char('wednesday', 11)->nullable();
            $table->char('thursday', 11)->nullable();
            $table->char('friday', 11)->nullable();
            $table->char('saturday', 11)->nullable();
            $table->char('sunday', 11)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
};
