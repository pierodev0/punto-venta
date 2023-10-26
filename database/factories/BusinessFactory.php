<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Business>
 */
class BusinessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        return [
            'name' => $faker->company,
            'description' => $faker->sentence,
            'logo' => $faker->imageUrl($width = 200, $height = 200),
            'mail' => $faker->companyEmail,
            'address' => $faker->address,
            'ruc' => $faker->numerify('###########'), // 11 dígitos aleatorios
        ];
    }
}
