<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DiscountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('coupons')->insert([
            [
                'code' => 'DISCOUNT10',
                'discount_amount' => 1000,
                'discount_percentage' => 10,
                'quantity' => 10,
                'expires_at' => Carbon::now()->addDays(30),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => 'DISCOUNT20',
                'discount_amount' => 20000,
                'discount_percentage' => 20,
                'quantity' => 9,
                'expires_at' => Carbon::now()->addDays(30),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
