<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agents = User::create([
            'name' => 'Agent',
            'email' => 'agent@clearit.test',
            'password' => bcrypt('agent123'),
            'role' => 'agent',
        ]);


        $users = User::create([
            'name' => 'User',
            'email' => 'user@clearit.test',
            'password' => bcrypt('user123'),
            'role' => 'user',
        ]);

    }
}