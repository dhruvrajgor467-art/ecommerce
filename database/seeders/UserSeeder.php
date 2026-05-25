<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'is_admin' => true,
            ],
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Michael Lee',
                'email' => 'michael@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Sarah Wilson',
                'email' => 'sarah@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
        ]);
    }
}