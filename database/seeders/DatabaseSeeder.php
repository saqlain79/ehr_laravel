<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ClinicSeeder;
use Database\Seeders\AllergySeeder;
use Database\Seeders\DoctorSeeder;
use Database\Seeders\VaccineSeeder;
use Database\Seeders\PatientSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // ClinicSeeder::class,
            // AllergySeeder::class,
            // DoctorSeeder::class,
            // VaccineSeeder::class,
            PatientSeeder::class,
        ]);
        
        
    }
}
