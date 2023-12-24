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
        Schema::create('medical_reports', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('patient_id');
            // $table->unsignedBigInteger('doctor_id');
            $table->foreignId('patient_id')->references('id')->on('patients');
            $table->foreignId('doctor_id')->references('id')->on('doctors');
            $table->string('visit_reason');
            $table->date('visit_date');
            $table->string('diagnosis');
            $table->string('test');
            $table->string('test_results');
            $table->string('temperature');
            $table->string('blood_pressure');
            $table->string('heart_rate');
            $table->string('blood_oxygen');
            $table->string('remarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_reports');
    }
};
