<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PITSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        DB::table('users')->insert([
        // PIT Users
        [
            'nim' => '22515010111006',
            'name' => 'Budi Santoso',
            'prodi' => 'Teknik Informatika',
            'email' => 'budi.santoso@student.ub.ac.id',
            'password' => Hash::make('1234'),  // Hashed password
            'role' => 'PIT',
        ],
        [
            'nim' => '22515010111007',
            'name' => 'Indah Permata',
            'prodi' => 'Sistem Informasi',
            'email' => 'indah.permata@student.ub.ac.id',
            'password' => Hash::make('5678'),  // Hashed password
            'role' => 'PIT',
        ],
        [
            'nim' => '22515010111008',
            'name' => 'Andi Saputra',
            'prodi' => 'Teknik Komputer',
            'email' => 'andi.saputra@student.ub.ac.id',
            'password' => Hash::make('9101'),  // Hashed password
            'role' => 'PIT',
        ],
        [
            'nim' => '22515010111009',
            'name' => 'Lestari Wijaya',
            'prodi' => 'Teknologi Informasi',
            'email' => 'lestari.wijaya@student.ub.ac.id',
            'password' => Hash::make('1122'),  // Hashed password
            'role' => 'PIT',
        ],
        [
            'nim' => '22515010111010',
            'name' => 'Mira Asmara',
            'prodi' => 'Pendidikan Teknologi Informasi',
            'email' => 'mira.asmara@student.ub.ac.id',
            'password' => Hash::make('3344'),  // Hashed password
            'role' => 'PIT',
        ],
        ]);

    }
}
