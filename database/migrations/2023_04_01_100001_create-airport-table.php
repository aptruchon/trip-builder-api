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
        Schema::create('airports', function (Blueprint $table) {
            $table->string("code", 3)->primary();
            $table->string('city_code', 3);
            $table->string('name', 100);
            $table->string('city', 50);
            $table->string('country_code', 2);
            $table->string('region_code', 2);
            $table->float('latitude');
            $table->float('longitude');
            $table->string('timezone', 50);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airports');
    }
};
