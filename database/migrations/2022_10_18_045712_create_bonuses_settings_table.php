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
        Schema::create('bonuses_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->cascadeOnDelete()
                ->constrained('businesses');
            $table->tinyInteger('standard_bonus_size');
            $table->integer('activation_start', $precision = 0);
            $table->integer('deactivation_start', $precision = 0);
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
        Schema::dropIfExists('bonuses_settings');
    }
};
