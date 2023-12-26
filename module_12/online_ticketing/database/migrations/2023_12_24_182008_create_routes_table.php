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
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('from_location_id')->references('id')->on('locations');
            $table->foreignId('to_location_id')->references('id')->on('locations');
            $table->decimal('ticket_price', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('routes');
    }
};
