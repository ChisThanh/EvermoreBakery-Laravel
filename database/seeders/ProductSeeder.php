<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Nutrition;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $fake = \Faker\Factory::create();
        $category = Category::create([
            'name' => 'Category ' . now()->timestamp,
            'description' => $fake->text
        ]);

        for ($i = 0; $i < 10; $i++) {
            Product::create([
                'category_id' => $category->id,
                'name' => $fake->words(10, true),
                'price' => $fake->randomNumber(5),
                'price_sale' => $fake->randomNumber(5),
                'image' => $fake->imageUrl(),
                'stock_quantity' => $fake->randomNumber(2),
                'description' => $fake->text,
            ]);
        }
    }
}
