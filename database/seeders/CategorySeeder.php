<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Kransen',
            'Armbanden',
            'Potjes',
            'Vazen',
            'Sierkussens',
            'Kaarsen',
            'Schilderijen',
            'Fotolijsten',
            'Hangdecoraties',
            'Tafeldecoraties',
            'Bloemstukken',
            'Wanddecoraties',
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'slug' => Str::slug($category),
            ]);
        }
    }
}