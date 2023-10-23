<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Client;
use App\Models\Product;
use App\Models\Provider;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin user',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
        ]);

        // $this->call(CategorySeeder::class);
        User::factory()->count(5)->create();
        Category::factory()->count(5)->create();
        Provider::factory()->count(5)->create();
        Product::factory()->count(5)->create();
        Client::factory()->count(5)->create();
        // Purchase::factory()->count(5)->create();
    }
}
