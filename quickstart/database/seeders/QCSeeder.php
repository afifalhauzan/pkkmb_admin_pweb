<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class QCSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // QC Users
       DB::table('users')->insert([
        [
            'nim' => '22515010111001',
            'name' => 'Ahmad Fauzi',
            'prodi' => 'Teknik Informatika',
            'email' => 'ahmad.fauzi@student.ub.ac.id',
            'password' => Hash::make('1234'),  // Hashed password
            'role' => 'QC',
        ],
        [
            'nim' => '22515010111002',
            'name' => 'Siti Nurhaliza',
            'prodi' => 'Sistem Informasi',
            'email' => 'siti.nurhaliza@student.ub.ac.id',
            'password' => Hash::make('5678'),  // Hashed password
            'role' => 'QC',
        ],
        [
            'nim' => '22515010111003',
            'name' => 'Rizky Hidayat',
            'prodi' => 'Teknik Komputer',
            'email' => 'rizky.hidayat@student.ub.ac.id',
            'password' => Hash::make('9101'),  // Hashed password
            'role' => 'QC',
        ],
        [
            'nim' => '22515010111004',
            'name' => 'Dewi Kartika',
            'prodi' => 'Teknologi Informasi',
            'email' => 'dewi.kartika@student.ub.ac.id',
            'password' => Hash::make('1122'),  // Hashed password
            'role' => 'QC',
        ],
        [
            'nim' => '22515010111005',
            'name' => 'Firman Saputra',
            'prodi' => 'Pendidikan Teknologi Informasi',
            'email' => 'firman.saputra@student.ub.ac.id',
            'password' => Hash::make('3344'),  // Hashed password
            'role' => 'QC',
        ],
    ]);

    }
}
