<?php

namespace Database\Seeders;

use App\Models\CancelReason;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CancelReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CancelReason::factory(10)->create();
    }
}
