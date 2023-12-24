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
        Schema::create('patient_allergies', function (Blueprint $table) {
             // $table->id();
            // $table->unsignedBigInteger('patient_id');
            // $table->unsignedBigInteger('allergy_id');
            $table->timestamps();
            $table->foreignId('patient_id')->references('id')->on('patients');
            $table->foreignId('allergy_id')->references('id')->on('allergies');
            $table->primary(['patient_id','allergy_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_allergies');
    }
};
