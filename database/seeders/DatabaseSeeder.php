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
        $admin->givePermission('statistical-approve');

        $user = User::create([
            'name' => 'user',
            'email' => 'user@mail.com',
            'password' => bcrypt('123'),
        ]);
        $user->addRole('user');
        $user->givePermission('printer-approve');

        User::factory(2)->create();
    }
}
