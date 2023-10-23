<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
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
            'dni' => $faker->unique()->numerify('#######'), // Genera un número de 8 dígitos
            'ruc' => $faker->unique()->numerify('###########'), // Genera un número de 11 dígitos
            'address' => $faker->address, // Puede generar o no una dirección
            'phone' => $faker->unique()->numerify('9########'), // Genera un número de 9 dígitos
            'email' => $faker->unique()->email, 
        ];
    }
}
