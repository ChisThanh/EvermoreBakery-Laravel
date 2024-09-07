<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $fake = \Faker\Factory::create();
        $category = \App\Models\Category::create(['name' => 'Category 1']);
        for ($i = 0; $i < 10; $i++) {
            Product::create([
                'category_id' => $category->id,
                'name' => $fake->name,
                'price' => $fake->randomNumber(5),
                'price_sale' => $fake->randomNumber(5),
                'image' => $fake->imageUrl(),
                'stock_quantity' => $fake->randomNumber(2),
                'vi' => [
                    'description' => $fake->text,
                ],
                'en' => [
                    'description' => $fake->text,
                ],
            ]);
        }
    }
}
