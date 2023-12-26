<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up() : void
    {
        Schema::create('seat_allocations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trip_id')->references('id')->on('trips');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->integer('seat_number');
            $table->boolean('is_booked');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('seat_allocations');
    }
};
