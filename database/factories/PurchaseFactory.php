<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Purchase>
 */
class PurchaseFactory extends Factory
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
            'provider_id' => $faker->numberBetween(1, 5), // Reemplaza el rango según tus necesidades
            'user_id' => $faker->numberBetween(1, 5), // Reemplaza el rango según tus necesidades
            'purchase_date' => now(),
            'tax' => $faker->randomFloat(2, 1, 10), // Genera un número decimal con 2 decimales entre 1 y 10
            'total' => $faker->randomFloat(2, 10, 100), // Genera un número decimal con 2 decimales entre 10 y 100
            'status' => $faker->randomElement(['VALID', 'CANCELED'])
        ];
    }
}
