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
        Schema::create('patient_vaccine_clinics', function (Blueprint $table) {
            // $table->id();
            // $table->unsignedBigInteger('vaccine_id');
            $table->foreignId('vaccine_id')->references('id')->on('vaccines');

            // $table->unsignedBigInteger('patient_id');
            $table->foreignId('patient_id')->references('id')->on('patients');

            // $table->unsignedBigInteger('center_id');
            $table->foreignId('center_id')->references('id')->on('clinics');

            $table->date('vaccination_date');
            $table->string('dosage');
            $table->string('vaccine_administrator');
            $table->timestamps();

            $table->primary(['vaccine_id','patient_id','center_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_vaccine_clinics');
    }
};
