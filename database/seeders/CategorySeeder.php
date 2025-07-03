<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Traditional',
                'description' => 'Makanan tradisional Indonesia',
                'color' => '#dc2626'
            ],
            [
                'name' => 'Street Food',
                'description' => 'Makanan jalanan dan kaki lima',
                'color' => '#ea580c'
            ],
            [
                'name' => 'Restaurant',
                'description' => 'Restoran dan rumah makan',
                'color' => '#f97316'
            ],
            [
                'name' => 'Cafe',
                'description' => 'Kafe dan coffee shop',
                'color' => '#eab308'
            ],
            [
                'name' => 'Fast Food',
                'description' => 'Makanan cepat saji',
                'color' => '#22c55e'
            ],
            [
                'name' => 'Dessert',
                'description' => 'Makanan penutup dan kue',
                'color' => '#a855f7'
            ]
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description'],
                'color' => $category['color']
            ]);
        }
    }
}
