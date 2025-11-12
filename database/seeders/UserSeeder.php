<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin default
        User::updateOrCreate(
            ['email' => 'admin@utbendili.test'],
            [
                'name'     => 'Administrator',
                'password' => Hash::make('password123'), // ganti di produksi
                'is_admin' => true,
            ]
        );
    }
}
