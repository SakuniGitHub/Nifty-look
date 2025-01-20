<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a owner and admin
        $users = [
            [
                'name' => 'Owner',
                'email' => 'owner@example.com',
                'password' => Hash::make('password'),
                'role' => 'owner',
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin', // Add any extra fields as needed
            ],
        ];

        // Insert users into the database
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
