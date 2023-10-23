<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Provider>
 */
class ProviderFactory extends Factory
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
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'ruc_number' => $faker->unique()->numerify('###########'),
            'address' => $faker->address,
            'phone' => $faker->unique()->numerify('9########'),
        ];
    }
}
