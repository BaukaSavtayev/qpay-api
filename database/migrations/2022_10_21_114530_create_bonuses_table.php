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
        Schema::create('bonuses', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active');
            $table->integer('amount');
            $table->foreignId('business_id')->default(0)->nullable()->nullOnDelete()
                ->constrained('businesses');
            $table->foreignId('client_id')->nullable()->nullOnDelete()
                ->constrained('clients');
            $table->timestamp('activation_start')->nullable();
            $table->timestamp('deactivation_start')->nullable();
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
        Schema::dropIfExists('bonuses');
    }
};
