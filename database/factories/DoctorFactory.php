<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\City;
use App\Models\Gender;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class DoctorFactory extends Factory
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
        $category = Category::query()->select('id')->inRandomOrder()->first();
        $city = City::query()->select('id')->inRandomOrder()->first();
        $gender = Gender::query()->select('id')->inRandomOrder()->first();

        return [
            'name_en' => fake()->name(),
            'name_ar' => fake()->name(),
            'bio_en' => fake()->text(),
            'bio_ar' => fake()->text(),
            'image' => fake()->imageUrl(),
            'address_en' => fake()->address(),
            'address_ar' => fake()->address(),
            'lat' => fake()->latitude(),
            'lng' => fake()->longitude(),
            'price_per_hour' => fake()->randomNumber(),
            'patient_number' => fake()->randomNumber(),
            'experience_years' => fake()->randomNumber(),
            'category_id' => $category->id,
            'city_id' => $city->id,
            'gender_id' => $gender->id
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
