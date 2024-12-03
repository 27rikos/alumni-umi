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
            'prodi' => 'Pendidikan Teknologi Informasi',
        ]);
        Prodi::create([
            'kd_prodi' => 54,
            'prodi' => 'Sastra Inggris',
        ]);
        Prodi::create([
            'kd_prodi' => 55,
            'prodi' => 'Magister Ilmu Biomedik',
        ]);
        Prodi::create([
            'kd_prodi' => 56,
            'prodi' => 'Agroteknologi',
        ]);
        Prodi::create([
            'kd_prodi' => 57,
            'prodi' => 'Agribisnis',
        ]);
        Prodi::create([
            'kd_prodi' => 58,
            'prodi' => 'Manajemen',
        ]);
        Prodi::create([
            'kd_prodi' => 59,
            'prodi' => 'Magister Ilmu Manajemen',
        ]);
        Prodi::create([
            'kd_prodi' => 60,
            'prodi' => 'Manajemen Informatika',
        ]);
        Prodi::create([
            'kd_prodi' => 61,
            'prodi' => 'Akuntansi',
        ]);
        Prodi::create([
            'kd_prodi' => 62,
            'prodi' => 'Komputerisasi Akuntansi',
        ]);
        Prodi::create([
            'kd_prodi' => 63,
            'prodi' => 'Komputerisasi Akuntansi',
        ]);
    }
}