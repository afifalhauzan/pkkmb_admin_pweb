<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clusters')->insert([
            [
                'Cluster_ID' => 1,
                'Admin_NIM' => '22515010111006', // Example Admin
            ],
            [
                'Cluster_ID' => 2,
                'Admin_NIM' => '22515010111007',
            ],
            [
                'Cluster_ID' => 3,
                'Admin_NIM' => '22515010111008',
            ],
            [
                'Cluster_ID' => 4,
                'Admin_NIM' => '22515010111009',
            ],
            [
                'Cluster_ID' => 5,
                'Admin_NIM' => '22515010111010',
            ],
        ]);
        
        DB::table('kegiatan')->insert([
            [
                'ID_Kegiatan' => 1,
                'Admin_NIM' => '22515010111006',
                'Nama' => 'FUSION',
                'Tahun' => '2024',
            ],
            [
                'ID_Kegiatan' => 2,
                'Admin_NIM' => '22515010111007',
                'Nama' => 'STARTUP ACADEMY',
                'Tahun' => '2024',
            ],
            [
                'ID_Kegiatan' => 3,
                'Admin_NIM' => '22515010111008',
                'Nama' => 'SOCIAL CAMPAIGN',
                'Tahun' => '2024',
            ],
            [
                'ID_Kegiatan' => 4,
                'Admin_NIM' => '22515010111009',
                'Nama' => 'OPEN HOUSE',
                'Tahun' => '2024',
            ],
            [
                'ID_Kegiatan' => 5,
                'Admin_NIM' => '22515010111010',
                'Nama' => 'PKKMB',
                'Tahun' => '2024',
            ],
        ]);
        
        DB::table('mahasiswa')->insert([
            [
                'NIM' => '22515010111011',
                'Admin_NIM' => '22515010111006',
                'Cluster_ID' => 1,
                'Nama' => 'Agus Prasetyo',
                'Prodi' => 'Teknik Informatika',
                'Email' => 'agus.prasetyo@student.ub.ac.id',
            ],
            [
                'NIM' => '22515010111012',
                'Admin_NIM' => '22515010111007',
                'Cluster_ID' => 2,
                'Nama' => 'Dewi Sulastri',
                'Prodi' => 'Teknik Komputer',
                'Email' => 'dewi.sulastri@student.ub.ac.id',
            ],
            [
                'NIM' => '22515010111013',
                'Admin_NIM' => '22515010111008',
                'Cluster_ID' => 3,
                'Nama' => 'Budi Santoso',
                'Prodi' => 'Sistem Informasi',
                'Email' => 'budi.santoso@student.ub.ac.id',
            ],
            [
                'NIM' => '22515010111014',
                'Admin_NIM' => '22515010111009',
                'Cluster_ID' => 4,
                'Nama' => 'Siti Nurhaliza',
                'Prodi' => 'Teknologi Informasi',
                'Email' => 'siti.nurhaliza@student.ub.ac.id',
            ],
            [
                'NIM' => '22515010111015',
                'Admin_NIM' => '22515010111010',
                'Cluster_ID' => 5,
                'Nama' => 'Rizky Hidayat',
                'Prodi' => 'Pendidikan Teknologi Informasi',
                'Email' => 'rizky.hidayat@student.ub.ac.id',
            ],
            [
                'NIM' => '22515010111029',
                'Admin_NIM' => '22515010111010',
                'Cluster_ID' => 5,
                'Nama' => 'Afiif Hauzan',
                'Prodi' => 'Pendidikan Teknologi Informasi',
                'Email' => 'afiif@student.ub.ac.id',
            ],
        ]);
        
        DB::table('valid_tugas')->insert([
            [
                'Judul' => 'Tugas 1: Analisis Sistem Informasi',
                'Deskripsi' => 'Menganalisis sistem informasi yang digunakan di perusahaan.',
                'Admin_NIM' => '22515010111006',
            ],
            [
                'Judul' => 'Tugas 2: Pembuatan Website',
                'Deskripsi' => 'Membuat website berbasis HTML dan CSS.',
                'Admin_NIM' => '22515010111007',
            ],
            [
                'Judul' => 'Tugas 3: Implementasi Algoritma Sorting',
                'Deskripsi' => 'Mengimplementasikan algoritma sorting dalam bahasa pemrograman Java.',
                'Admin_NIM' => '22515010111008',
            ],
            [
                'Judul' => 'Tugas 4: Analisis Jaringan Komputer',
                'Deskripsi' => 'Menganalisis dan merancang jaringan komputer untuk perusahaan.',
                'Admin_NIM' => '22515010111009',
            ],
            [
                'Judul' => 'Tugas 5: Pengembangan Aplikasi Mobile',
                'Deskripsi' => 'Membuat aplikasi mobile sederhana menggunakan Flutter.',
                'Admin_NIM' => '22515010111010',
            ],
        ]);
        
        DB::table('tugas')->insert([
            [
                'Mahasiswa_NIM' => '22515010111011',
                'ID_Tugas' => 1,
                'File_Tugas' => 'https://drive.google.com/file/d/1Jd7eLBGb6M0oNl2wx-xyGcA4vYPz7Td_/view?usp=sharing',
                'Nilai' => 80,
            ],
            [
                'Mahasiswa_NIM' => '22515010111012',
                'ID_Tugas' => 2,
                'File_Tugas' => 'https://drive.google.com/file/d/1H1xd_MFzG_4yjr53nU1BdjBf-uZJH6W5/view?usp=sharing',
                'Nilai' => 90,
            ],
            [
                'Mahasiswa_NIM' => '22515010111013',
                'ID_Tugas' => 3,
                'File_Tugas' => 'https://drive.google.com/file/d/1OtIbE6G5zHh-3dcGldhMY5ZvFhD4umTw/view?usp=sharing',
                'Nilai' => 85,
            ],
            [
                'Mahasiswa_NIM' => '22515010111014',
                'ID_Tugas' => 4,
                'File_Tugas' => 'https://drive.google.com/file/d/1Ku_QxhdQlHphhD5FTu4oghtmGR3rmZMI/view?usp=sharing',
                'Nilai' => 95,
            ],
            [
                'Mahasiswa_NIM' => '22515010111015',
                'ID_Tugas' => 5,
                'File_Tugas' => 'https://drive.google.com/file/d/1lDh0DtsdHp7XysB1DwrpVOSpJzduCyoX/view?usp=sharing',
                'Nilai' => 92,
            ],
        ]);
        
        DB::table('valid_presensi')->insert([
            [
                'Kode_Presensi' => 'FUSION2024',
                'Kegiatan_ID' => 1,
                'Description' => 'Presensi untuk kegiatan Fusion 2024',
            ],
            [
                'Kode_Presensi' => 'STARTUP2024',
                'Kegiatan_ID' => 2,
                'Description' => 'Presensi untuk kegiatan Startup Academy 2024',
            ],
            [
                'Kode_Presensi' => 'SC2024',
                'Kegiatan_ID' => 3,
                'Description' => 'Presensi untuk kegiatan Social Campaign 2024',
            ],
            [
                'Kode_Presensi' => 'OH2024',
                'Kegiatan_ID' => 4,
                'Description' => 'Presensi untuk kegiatan Open House 2024',
            ],
            [
                'Kode_Presensi' => 'PKKMB2024',
                'Kegiatan_ID' => 5,
                'Description' => 'Presensi untuk kegiatan PKKMB 2024',
            ],
        ]);
        
        DB::table('presensi')->insert([
            [
                'Kode_Presensi' => 'FUSION2024',
                'Admin_NIM' => '22515010111006',
                'Mahasiswa_NIM' => '22515010111011',
                'Kegiatan_ID' => 1,
                'Waktu_Presensi' => now(),
            ],
            [
                'Kode_Presensi' => 'STARTUP2024',
                'Admin_NIM' => '22515010111007',
                'Mahasiswa_NIM' => '22515010111012',
                'Kegiatan_ID' => 2,
                'Waktu_Presensi' => now(),
            ],
            [
                'Kode_Presensi' => 'SC2024',
                'Admin_NIM' => '22515010111008',
                'Mahasiswa_NIM' => '22515010111013',
                'Kegiatan_ID' => 3,
                'Waktu_Presensi' => now(),
            ],
            [
                'Kode_Presensi' => 'OH2024',
                'Admin_NIM' => '22515010111009',
                'Mahasiswa_NIM' => '22515010111014',
                'Kegiatan_ID' => 4,
                'Waktu_Presensi' => now(),
            ],
            [
                'Kode_Presensi' => 'PKKMB2024',
                'Admin_NIM' => '22515010111010',
                'Mahasiswa_NIM' => '22515010111015',
                'Kegiatan_ID' => 5,
                'Waktu_Presensi' => now(),
            ],
        ]);
        
    }
}
