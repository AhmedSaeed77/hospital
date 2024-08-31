<?php

namespace Database\Seeders;

use App\Models\DoctorTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

            $daysOfWeeks = [
                'Sunday' => ['ar' => 'الأحد', 'en' => 'Sunday' , 'index' => '1'],
                'Monday' => ['ar' => 'الاثنين', 'en' => 'Monday' , 'index' => '2'],
                'Tuesday' => ['ar' => 'الثلاثاء', 'en' => 'Tuesday' , 'index' => '3'],
                'Wednesday' => ['ar' => 'الأربعاء', 'en' => 'Wednesday' , 'index' => '4'],
                'Thursday' => ['ar' => 'الخميس', 'en' => 'Thursday' , 'index' => '5'],
                'Friday' => ['ar' => 'الجمعة', 'en' => 'Friday' , 'index' => '6'],
                'Saturday' => ['ar' => 'السبت', 'en' => 'Saturday' , 'index' => '7'],
            ];
            foreach ($daysOfWeeks as $day => $translations)
            {
                DoctorTime::create([
                                        'doctor_id' => 1,
                                        'day_ar' => $translations['ar'],
                                        'day_en' => $translations['en'],
                                        'day_index' => $translations['index'],
                                        'from' => '09:00',
                                        'to' => '17:00'
                                    ]);
                DoctorTime::create([
                                        'doctor_id' => 2,
                                        'day_ar' => $translations['ar'],
                                        'day_en' => $translations['en'],
                                        'day_index' => $translations['index'],
                                        'from' => '09:00',
                                        'to' => '17:00'
                                    ]);
                DoctorTime::create([
                                        'doctor_id' => 3,
                                        'day_ar' => $translations['ar'],
                                        'day_en' => $translations['en'],
                                        'day_index' => $translations['index'],
                                        'from' => '09:00',
                                        'to' => '17:00'
                                    ]);
                DoctorTime::create([
                                        'doctor_id' => 4,
                                        'day_ar' => $translations['ar'],
                                        'day_en' => $translations['en'],
                                        'day_index' => $translations['index'],
                                        'from' => '09:00',
                                        'to' => '17:00'
                                    ]);
                DoctorTime::create([
                                        'doctor_id' => 5,
                                        'day_ar' => $translations['ar'],
                                        'day_en' => $translations['en'],
                                        'day_index' => $translations['index'],
                                        'from' => '09:00',
                                        'to' => '17:00'
                                    ]);
                DoctorTime::create([
                                        'doctor_id' => 6,
                                        'day_ar' => $translations['ar'],
                                        'day_en' => $translations['en'],
                                        'day_index' => $translations['index'],
                                        'from' => '09:00',
                                        'to' => '17:00'
                                    ]);
                DoctorTime::create([
                                        'doctor_id' => 7,
                                        'day_ar' => $translations['ar'],
                                        'day_en' => $translations['en'],
                                        'day_index' => $translations['index'],
                                        'from' => '09:00',
                                        'to' => '17:00'
                                    ]);
                DoctorTime::create([
                                        'doctor_id' => 8,
                                        'day_ar' => $translations['ar'],
                                        'day_en' => $translations['en'],
                                        'day_index' => $translations['index'],
                                        'from' => '09:00',
                                        'to' => '17:00'
                                    ]);
                DoctorTime::create([
                                        'doctor_id' => 9,
                                        'day_ar' => $translations['ar'],
                                        'day_en' => $translations['en'],
                                        'day_index' => $translations['index'],
                                        'from' => '09:00',
                                        'to' => '17:00'
                                    ]);
                DoctorTime::create([
                                        'doctor_id' => 10,
                                        'day_ar' => $translations['ar'],
                                        'day_en' => $translations['en'],
                                        'day_index' => $translations['index'],
                                        'from' => '09:00',
                                        'to' => '17:00'
                                    ]);
            }
        }
}
