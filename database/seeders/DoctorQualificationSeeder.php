<?php

namespace Database\Seeders;

use App\Models\DoctorQualification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorQualificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DoctorQualification::factory(10)->create();
    }
}
