<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

// Informasi Mahasiswa, List Tugas
Route::get('/mahasiswa/listtugas', [UserController::class, 'getListTugas']);
Route::get('/kegiatan', [UserController::class, 'getKegiatan']);
Route::get('/mahasiswa/{nim}', [UserController::class, 'getMahasiswaByNim']);

// Penugasan
Route::get('/tugas/status/{nim}/{id_tugas}', [UserController::class, 'getStatusTugas']);
Route::post('/tugas/submit/{nim}/{taskId}/{submissionLink}', [UserController::class, 'submitTugas'])
    ->where('submissionLink', '.*');

// Presensi
Route::post('/presensi/submit/{nim}/{kode_presensi}', [UserController::class, 'submitPresensi']);

// Route::get('/tugas/submit/{nim}/{id_tugas}/{file_tugas}', [UserController::class, 'submitTugas']);
//Route::post('/tugas/submit/{nim}/{id_tugas}', [UserController::class, 'submitTugas']);
Route::put('/tugas/update/{nim}/{id_tugas}', [UserController::class, 'updateTugas']);
Route::get('/users', [UserController::class, 'getUsers']);


Route::get('/mahasiswa/rekap-kehadiran/{nim}', [UserController::class, 'getRekapKehadiran']);








