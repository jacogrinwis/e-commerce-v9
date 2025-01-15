<?php

namespace Database\Seeders;

use Faker\Factory;
use Spatie\Tags\Tag;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()->count(50)->create()->each(function ($product) {
            $faker = Factory::create();
            $product->category()->associate(Category::inRandomOrder()->first());
            $product->save();
            $product->colors()->attach($faker->numberBetween(1, 12));
            $product->materials()->attach($faker->numberBetween(1, 10));
            $tags = Tag::all();
            $product->attachTags($tags->random(rand(1, 3)));
        });
    }
}
