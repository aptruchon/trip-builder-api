<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('airline', 2);
            $table->integer('number');
            $table->string('departure_airport', 3);
            $table->time('departure_time');
            $table->string('arrival_airport', 3);
            $table->time('arrival_time');
            $table->date('ddn')->nullable();
            $table->float("price");
            $table->softDeletes();

            // Foreign key constraints
            $table->foreign('airline')->references('code')->on('airlines')->onDelete('cascade');
            $table->foreign('departure_airport')->references('code')->on('airports')->onDelete('cascade');
            $table->foreign('arrival_airport')->references('code')->on('airports')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
