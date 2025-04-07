<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'user 1',
            'email' =>'user1@email.com',
            'password' => '123456789'
        ]);
        User::create([
            'name' => 'user 2',
            'email' =>'user2@email.com',
            'password' => '123456789'
        ]);
    }
}
