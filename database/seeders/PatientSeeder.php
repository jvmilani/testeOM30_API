<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Patient::factory(100)->create()->each(function ($patient) {
            Address::factory(1)->create(['patient_id' => $patient->id]);
        });
    }
}
