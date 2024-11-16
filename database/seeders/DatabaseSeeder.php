<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            LaratrustSeeder::class,
            ProductSeeder::class,
            DiscountsTableSeeder::class,
            EventSeeder::class,
        ]);

        User::factory(2)->create();
        $now = now();
        $sadmin = User::create([
            'name' => 'sadmin',
            'email' => 'sadmin@mail.com',
            'password' => bcrypt('123'),
            'email_verified_at' => $now,
        ]);
        $sadmin->addRole('sadmin');

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('123'),
            'email_verified_at' => $now,
        ]);
        $admin->addRole('admin');

        $user = User::create([
            'name' => 'user',
            'email' => 'user@mail.com',
            'password' => bcrypt('123'),
            'email_verified_at' => $now,
        ]);
        $user->addRole('user');
    }
}
