<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'npm' => '00000000',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin1234'),
            'role' => 'admin',
            'email_verified_at' => date('Y-m-d H:i:s', time()),
        ]);
        User::create([
            'name' => 'FIKOM',
            'npm' => '00000000',
            'email' => 'fikom@gmail.com',
            'password' => bcrypt('fikom1234'),
            'role' => 'falkutas',
            'email_verified_at' => date('Y-m-d H:i:s', time()),
        ]);
    }
}