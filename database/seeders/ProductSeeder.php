<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Image;
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

        for ($i = 0; $i < 20; $i++) {
            if ($i < 5) {
                $category = Category::create([
                    'name' => 'Category ' . now()->timestamp,
                    'description' => $fake->text
                ]);
                $category->images()
                    ->create(['url' => 'images/categories/0D4mqkyOHOrjbGwCGfSPc2HSX6rijbtdJMtLzS6m.jpg']);
            }
            $product = Product::create([
                'category_id' => $category->id,
                'name' => $fake->words(3, true),
                'price' => $fake->randomNumber(5),
                'price_sale' => $fake->randomNumber(5),
                'stock_quantity' => $fake->randomNumber(2),
                'description' => $fake->text,
            ]);
            $product->images()
                ->create(['url' => 'images/products/0D4mqkyOHOrjbGwCGfSPc2HSX6rijbtdJMtLzS6m.jpg']);
        }
    }
}
