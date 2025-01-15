<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            ['name' => 'Blauw', 'color' => 'blue'],
            ['name' => 'Geel', 'color' => 'yellow'],
            ['name' => 'Goud', 'color' => 'gold'],
            ['name' => 'Grijs', 'color' => 'gray'],
            ['name' => 'Groen', 'color' => 'green'],
            ['name' => 'Indigo', 'color' => 'indigo'],
            ['name' => 'Paars', 'color' => 'purple'],
            ['name' => 'Roze', 'color' => 'pink'],
            ['name' => 'Rood', 'color' => 'red'],
            ['name' => 'Wit', 'color' => 'white'],
            ['name' => 'Zilver', 'color' => 'silver'],
            ['name' => 'Zwart', 'color' => 'black'],
        ];

        foreach ($colors as $color) {
            Color::create([
                'name' => $color['name'],
                'color' => $color['color'],
                'slug' => Str::slug($color['name']),
            ]);
        }
    }
}
