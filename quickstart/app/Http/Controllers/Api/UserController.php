<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\ValidTugas;
use App\Models\ValidPresensi;
use App\Models\Tugas;
use App\Models\Kegiatan;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function getUsers()
    {
        $users = User::all(['nim', 'name', 'prodi', 'role']);
        return response()->json(['success' => true, 'data' => $users]);
    }

    public function getKegiatan()
    {
        // Fetch all kegiatan records with specific fields
        $kegiatan = Kegiatan::all(['Nama', 'Tahun']);

        return response()->json([
            'success' => true,
            'data' => $kegiatan
        ]);
    }


    public function getListTugas()
    {
        // Retrieve all valid tasks (ValidTugas) along with their 'Judul' and 'Deskripsi'
        $tugas = ValidTugas::all(['ID_Tugas', 'Judul', 'Deskripsi']);

        // Return the tasks as a JSON response
        return response()->json([
            'success' => true,
            'data' => $tugas
        ]);
    }


    public function getMahasiswaByNim($nim)
    {
        // Fetch the Mahasiswa along with the Admin info (Admin_NIM)
        $mahasiswa = Mahasiswa::where('NIM', $nim)->first();

        if ($mahasiswa) {
            // Find the admin by Admin_NIM
            $admin = User::where('NIM', $mahasiswa->Admin_NIM)->first();

            // Check if the admin exists and has the role 'QC'
            $qc_nim = null;
            $qc_name = null;
            if ($admin && $admin->role === 'QC') {
                $qc_nim = $admin->nim;
                $qc_name = $admin->name;
            }

            return response()->json([
                'success' => true,
                'data' => [
                    'nim' => $mahasiswa->NIM,
                    'name' => $mahasiswa->Nama,
                    'qc_nim' => $qc_nim,  // admin NIM
                    'qc_name' => $qc_name, // admin name
                    'cluster_id' => $mahasiswa->Cluster_ID,
                ]
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Mahasiswa not found'
            ], 404);
        }
    }

    public function submitTugas(Request $request, $nim, $id_tugas, $file_tugas)
    {
        // Log::info("NIM: " . $nim);
        // Log::info("ID Tugas: " . $id_tugas);
        // Log::info("File Tugas: " . $file_tugas);
        // $file_tugas = urldecode($file_tugas);
        // // Validate that the file_tugas is a valid URL
        // if (!filter_var($file_tugas, FILTER_VALIDATE_URL)) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Invalid URL for the submission link'
        //     ], 400);
        // }

        // Check if the mahasiswa exists
        $mahasiswa = Mahasiswa::where('NIM', $nim)->first();
        if (!$mahasiswa) {
            return response()->json([
                'success' => false,
                'message' => 'Mahasiswa not found'
            ], 404);
        }

        // Save the task submission
        $tugas = new Tugas();
        $tugas->Mahasiswa_NIM = $nim;
        $tugas->ID_Tugas = $id_tugas;
        $tugas->File_Tugas = $file_tugas;
        $tugas->save();

        return response()->json([
            'success' => true,
            'message' => 'Tugas submitted successfully'
        ]);
    }




    public function updateTugas(Request $request, $nim, $id_tugas)
    {
        try {
            $request->validate([
                'file_tugas' => 'required|url'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        }

        $mahasiswa = Mahasiswa::where('NIM', $nim)->first();
        if (!$mahasiswa) {
            return response()->json([
                'success' => false,
                'message' => 'Mahasiswa not found'
            ], 404); // Explicit 404 status code
        }

        $tugas = Tugas::where('ID_Tugas', $id_tugas)->where('Mahasiswa_NIM', $nim)->first();

        if (!$tugas) {
            return response()->json([
                'success' => false,
                'message' => 'Tugas not found'
            ], 404);
        }

        $tugas->File_Tugas = $request->file_tugas;
        $tugas->save();

        if ($tugas->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Tugas updated successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update tugas'
            ], 500); // 500 for internal server error
        }
    }

    public function getStatusTugas($nim, $id_tugas)
    {
        // Cari tugas berdasarkan NIM mahasiswa dan ID tugas
        $tugas = Tugas::where('Mahasiswa_NIM', $nim)
            ->where('ID_Tugas', $id_tugas)
            ->first();

        if ($tugas) {
            return response()->json([
                'success' => true,
                'data' => [
                    'id_tugas' => $tugas->ID_Tugas,
                    'file_tugas' => $tugas->File_Tugas,
                    'nilai' => $tugas->Nilai,
                    'updated_at' => $tugas->updated_at,
                ]
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Tugas not found'
            ], 404);
        }
    }

    public function submitPresensi(Request $request, $nim, $kode_presensi)
    {
        // Cari mahasiswa berdasarkan NIM
        $mahasiswa = Mahasiswa::where('NIM', $nim)->first();

        if (!$mahasiswa) {
            return response()->json([
                'success' => false,
                'message' => 'Mahasiswa not found'
            ], 404);
        }

        // Validasi kode presensi melalui ValidPresensi
        $validPresensi = ValidPresensi::where('Kode_Presensi', $kode_presensi)->first();

        if (!$validPresensi) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Kode Presensi'
            ], 400); // Bad Request
        }

        $id_kegiatan = $validPresensi->Kegiatan_ID;
        $admin_nim = $validPresensi->Admin_NIM;

        // Cek apakah mahasiswa sudah mengisi presensi untuk kegiatan ini
        $presensi = Presensi::where('Mahasiswa_NIM', $nim)
            ->where('Kegiatan_ID', $id_kegiatan)
            ->first();

        if ($presensi) {
            return response()->json([
                'success' => false,
                'message' => 'Anda sudah presensi sebelumnya'
            ], 400);
        }

        // Simpan presensi
        Presensi::create([
            'Kode_Presensi' => $kode_presensi,  // Tambahkan Kode_Presensi
            'Admin_NIM' => $admin_nim,         // Tambahkan Admin_NIM
            'Mahasiswa_NIM' => $nim,
            'Kegiatan_ID' => $id_kegiatan,
            'Waktu_Presensi' => now()
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Presensi submitted successfully'
        ]);
    }
}
