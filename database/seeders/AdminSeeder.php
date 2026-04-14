<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    \App\Models\User::firstOrCreate(
        ['email' => 'admin@TRK.com'],
        [
            'name'     => 'Admin',
            'password' => bcrypt('admin123'),
            'role'     => 'admin',
        ]
    );
}
    }

