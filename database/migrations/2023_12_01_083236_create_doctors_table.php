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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('center_id');
            $table->foreignId('center_id')->references('id')->on('clinics');
            $table->string('doctor_name');
            $table->unsignedBigInteger('contact');
            $table->string('email');
            $table->date('dob');
            $table->unsignedBigInteger('license_num')->unique();
            $table->string('specialty');
            $table->integer('years_of_exp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
