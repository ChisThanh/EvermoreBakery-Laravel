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
        $now = Carbon::now();
        $coupons = [
            [
                'code' => '10',
                'discount_amount' => 1000,
                'discount_percentage' => 10,
                'quantity' => 10,
                'expires_at' => $now->copy()->addDays(30),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'code' => '20',
                'discount_amount' => 20000,
                'discount_percentage' => 20,
                'quantity' => 9,
                'expires_at' => $now->copy()->addDays(30),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'code' => '50',
                'discount_amount' => 50000,
                'discount_percentage' => 40,
                'quantity' => 9,
                'expires_at' => $now->copy()->addDays(30),
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        \DB::table('coupons')->insert($coupons);
    }
}
