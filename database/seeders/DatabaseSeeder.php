<?php

namespace Database\Seeders;

use App\Models\Peminatan;
use App\Models\Prodi;
use App\Models\User;
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
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin1234'),
            'role' => 'admin',
            'email_verified_at' => date('Y-m-d H:i:s', time()),
        ]);
        Peminatan::create([
            'kd_peminatan' => 'SC',
            'peminatan' => 'Sistem Cerdas',
        ]);

        Peminatan::create([
            'kd_peminatan' => 'SBD',
            'peminatan' => 'Spesialis Basis Data',
        ]);

        Prodi::create([
            'kd_prodi' => 51,
            'prodi' => 'Teknik Informatika',
        ]);
        Prodi::create([
            'kd_prodi' => 52,
            'prodi' => 'Sistem Informasi',
        ]);
        Prodi::create([
            'kd_prodi' => 53,
            'prodi' => 'Pendidikan Teknologi Informatika',
        ]);
    }
}