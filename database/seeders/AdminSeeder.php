<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
             'name' => 'Admin',
             'email' => 'admin@gmail.com',
             'password' => Hash::make(123456789),
             'type' => 'admin',
             'email_verified_at' => now(),
        ]);
    }
}
