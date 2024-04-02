<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'esmart211203@gmail.com',
            'phone' => '0989748659',
            'avatar' => 'avatar.png',   
            'password' => Hash::make('Trong03do@'),
            'role' => 'admin',   
        ]);
    }
}
