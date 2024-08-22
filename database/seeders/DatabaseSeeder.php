<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(10)->create();

        User::insert([
            [
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'password' => bcrypt('123'),
            ],
            [
                'name' => 'user',
                'email' => 'user@mail.com',
                'password' => bcrypt('123'),
            ],
        ]);
    }
}
