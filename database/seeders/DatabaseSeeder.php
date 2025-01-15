<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Product::factory(10)->create();

        $this->call([
            CategorySeeder::class,
            ColorSeeder::class,
            MaterialSeeder::class,
            TagSeeder::class,
            ProductSeeder::class,
            ProductImageSeeder::class,
        ]);
    }
}