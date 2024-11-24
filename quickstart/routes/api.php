<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

Route::get('/users', [UserController::class, 'getUsers']);
Route::get('/mahasiswa/listtugas', [UserController::class, 'getListTugas']);
Route::get('/kegiatan', [UserController::class, 'getKegiatan']);

Route::get('/mahasiswa/{nim}', [UserController::class, 'getMahasiswaByNim']);

Route::get('/tugas/status/{nim}/{id_tugas}', [UserController::class, 'getStatusTugas']);
Route::put('/tugas/update/{nim}/{id_tugas}', [UserController::class, 'updateTugas']);
Route::post('/tugas/submit/{nim}/{id_tugas}', [UserController::class, 'submitTugas']);


Route::post('/presensi/submit/{nim}/{kode_presensi}', [UserController::class, 'submitPresensi']);





