<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            LaratrustSeeder::class,
            ProductSeeder::class,
        ]);

        User::factory(2)->create();

        $sadmin = User::create([
            'name' => 'sadmin',
            'email' => 'sadmin@mail.com',
            'password' => bcrypt('123'),
        ]);
        $sadmin->addRole('sadmin');

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('123'),
        ]);
        $admin->addRole('admin');

        $user = User::create([
            'name' => 'user',
            'email' => 'user@mail.com',
            'password' => bcrypt('123'),
        ]);
    }
}
