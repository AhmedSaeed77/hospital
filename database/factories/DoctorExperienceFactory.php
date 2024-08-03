<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Doctor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class DoctorExperienceFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $doctor = Doctor::query()->select('id')->inRandomOrder()->first();

        return [
            'hospital_en' => fake()->name(),
            'hospital_ar' => fake()->name(),
            'job_title_en' => fake()->name(),
            'job_title_ar' => fake()->name(),
            'description_en' => fake()->text(),
            'description_ar' => fake()->text(),
            'doctor_id' => $doctor->id
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
