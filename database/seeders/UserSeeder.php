<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@arahcreative.com'],
            [
                'name' => 'Administrator ARAH',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );
    }
}
