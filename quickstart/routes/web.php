<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\ExportController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

// Route::get('/', function () {
//     return view('login');
// });
Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [PageController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [PageController::class, 'index'])->name('penugasan');
    Route::get('/dashboard/mahasiswa', [PageController::class, 'mahasiswa'])->name('mahasiswa');
    Route::get('/dashboard/absensi', [PageController::class, 'absensi'])->name('absensi');
    Route::get('/dashboard/kegiatan', [PageController::class, 'kegiatan'])->name('kegiatan');
    Route::get('/dashboard/mahasiswa/add', [PageController::class, 'toAddMahasiswa'])->name('toAddMahasiswa');
    Route::get('/dashboard/mahasiswa/{cluster}', [PageController::class, 'cekMhsCluster'])->name('cluster.show');

    Route::get('/dashboard/QCmahasiswa', [PageController::class, 'QCmahasiswa'])->name('QCmahasiswa');
    Route::get('/dashboard/QCmahasiswa/{cluster}', [PageController::class, 'QCcekMhsCluster'])->name('QCcekMhsCluster');
    Route::get('/dashboard/QCPenugasan/{id_tugas}', [PageController::class, 'QCViewTugas'])->name('QCViewTugas');
    Route::get('/dashboard/QCPenugasan', [PageController::class, 'QCtoAddPenugasan'])->name('QCtoAddPenugasan');
    Route::post('/dashboard/QCPenugasan/add', [PageController::class, 'AddPenugasan'])->name('QCAddPenugasan');
    Route::put('/dashboard/QCPenugasan/update-nilai/{id_tugas}/{nim}', [PageController::class, 'QCupdateNilai'])->name('QCupdateNilai');
    Route::post('/dashboard/QCPenugasan/update-nilai/{id_tugas}/{nim}', [PageController::class, 'QCupdateNilai'])->name('QCupdateNilai');

    Route::get('/dashboard/penugasan/add', [PageController::class, 'toAddPenugasan'])->name('toAddPenugasan');
    Route::post('/dashboard', [PageController::class, 'AddPenugasan'])->name('AddPenugasan');

    // Route::get('/dashboard/mahasiswa/add', [PageController::class, 'toAddMahasiswa'])->name('toAddMahasiswa');
    Route::get('/dashboard/mahasiswa/edit/{id}', [PageController::class, 'toEditMahasiswa'])->name('toEditMahasiswa');
    Route::put('/dashboard/mahasiswa/{id}', [PageController::class, 'EditMahasiswa'])->name('EditMahasiswa');
    Route::delete('/dashboard/mahasiswa/{id}', [PageController::class, 'DeleteMahasiswa'])->name('DeleteMahasiswa');
    Route::post('/dashboard/mahasiswa/add', [PageController::class, 'AddMahasiswa'])->name('AddMahasiswa');

    Route::get('/dashboard/absensi/add', [PageController::class, 'toAddAbsensi'])->name('toAddAbsensi');
    Route::post('/dashboard/absensi/add/', [PageController::class, 'addAbsensi'])->name('addAbsensi');
    Route::delete('/absensi/{id}', [PageController::class, 'absensiDestroy'])->name('absensi.destroy');

    Route::get('/dashboard/kegiatan/add', [PageController::class, 'toAddKegiatan'])->name('toAddKegiatan');
    Route::post('/dashboard/kegiatan/add/', [PageController::class, 'addKegiatan'])->name('addKegiatan');


    // Export Routes for Admin PIT (PIT-UR-07)
    Route::get('/export/kegiatan', [ExportController::class, 'exportKegiatan'])->name('export.kegiatan');
    Route::get('/export/absensi', [ExportController::class, 'exportAbsensi'])->name('export.absensi');
    Route::get('/export/tugas', [ExportController::class, 'exportTugas'])->name('export.tugas');
});


require __DIR__.'/auth.php';
