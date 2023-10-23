<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
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
            'code' => $faker->unique()->bothify('########'),
            'name' => $faker->unique()->text(50),
            'stock' => $faker->numberBetween(0, 100),
            'image' => $faker->imageUrl(),
            'sell_price' => $faker->randomFloat(2, 10, 1000),
            'status' => $faker->randomElement(['ACTIVE', 'DEACTIVATED']),
            'provider_id' => $faker->numberBetween(1, 5), // Ajusta los límites según tu caso
            'category_id' => $faker->numberBetween(1, 5), // Ajusta los límites según tu caso
        ];
    }
}
