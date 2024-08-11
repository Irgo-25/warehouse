<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::create([
            'name' => 'Irgo Satya Gemiwang',
            'email' => 'irgosg@gmail.com',
            'password' => Hash::make('Irgo123'),
            'role_id' => 1,
        ]);
        $user1->assignRole('admin');

        $user2 = User::create([
            'name' => 'Ragil Bagus',
            'email' => 'ragil21@gmail.com',
            'password' => Hash::make('Ragil123'),
            'role_id' => 2,
        ]);
        $user2->assignRole('gudang');

        $user3 = User::create([
            'name' => 'Ramadhan',
            'email' => 'Ramadhan@gmail.com',
            'password' => Hash::make('Rama123'),
            'role_id' => 3,
        ]);
        $user3->assignRole('accounting');
    }
}
