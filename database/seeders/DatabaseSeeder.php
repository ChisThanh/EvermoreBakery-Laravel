<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        if (env('APP_ENV') === 'local') {
            $this->call([
                LaratrustSeeder::class,
                ProductSeeder::class,
                EventSeeder::class,
                CouponSeeder::class,
            ]);
        } else {
            $this->call([
                LaratrustSeeder::class,
            ]);
        }

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

        $user = User::create([
            'name' => 'thanh',
            'email' => 'thanh@mail.com',
            'password' => bcrypt('123'),
            'email_verified_at' => $now,
        ]);
        $user->addRole('admin');

        $user = User::create([
            'name' => 'long',
            'email' => 'long@mail.com',
            'password' => bcrypt('123'),
            'email_verified_at' => $now,
        ]);
        $user->addRole('user');

        $user = User::create([
            'name' => 'vy',
            'email' => 'vy@mail.com',
            'password' => bcrypt('123'),
            'email_verified_at' => $now,
        ]);
        $user->addRole('user');

        User::factory(2)->create();
    }
}
