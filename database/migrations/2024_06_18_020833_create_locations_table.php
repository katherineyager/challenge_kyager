<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->string('locationid')->nullable();
            $table->string('applicant')->nullable();
            $table->string('facilitytype')->nullable();
            $table->string('cnn')->nullable();
            $table->string('locationdescription')->nullable();
            $table->string('address')->nullable();
            $table->string('blocklot')->nullable();
            $table->string('block')->nullable();
            $table->string('lot')->nullable();
            $table->string('permit')->nullable();
            $table->string('status')->nullable();
            $table->string('fooditems',1000)->nullable();
            $table->string('x')->nullable();
            $table->string('y')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('schedule')->nullable();
            $table->string('dayshours')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
