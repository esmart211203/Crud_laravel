<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class TempDB extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'customer',
            'email' => 'ars211203@gmail.com',
            'phone' => '0989748659',
            'avatar' => 'avatar.png',   
            'password' => Hash::make('Trong03do@'),
            'role' => 'customer',   
        ]);
    }
}
