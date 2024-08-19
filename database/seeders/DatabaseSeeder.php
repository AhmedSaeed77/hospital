<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            GenderSeeder::class,
            ManagerSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            CitySeeder::class,
            DoctorSeeder::class,
            DoctorExperienceSeeder::class,
            DoctorQualificationSeeder::class,
            AdvertisementSeeder::class,
        ]);
    }
}
