<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventProduct;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $fake = \Faker\Factory::create();

        for ($i = 1; $i <= 3; $i++) {
            Event::create([
                'name' => "$i - $i",
                'description' => $fake->text,
                'start_date' => now()->subDays(1 * $i),
                'end_date' => now()->addDays(10 * $i),
            ]);
        }
        EventProduct::insert([
            ['event_id' => 1, 'product_id' => 1, 'percentage' => 10],
            ['event_id' => 1, 'product_id' => 2, 'percentage' => 20],
            ['event_id' => 1, 'product_id' => 3, 'percentage' => 30],
            ['event_id' => 2, 'product_id' => 4, 'percentage' => 10],
            ['event_id' => 2, 'product_id' => 5, 'percentage' => 20],
            ['event_id' => 2, 'product_id' => 6, 'percentage' => 30],
            ['event_id' => 3, 'product_id' => 7, 'percentage' => 40],
            ['event_id' => 3, 'product_id' => 8, 'percentage' => 10],
            ['event_id' => 3, 'product_id' => 9, 'percentage' => 30],
        ]);
    }
}
