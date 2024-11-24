<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
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

    Route::get('/dashboard/penugasan/add', [PageController::class, 'toAddPenugasan'])->name('toAddPenugasan');
    Route::post('/dashboard', [PageController::class, 'AddPenugasan'])->name('AddPenugasan');

    // Route::get('/dashboard/mahasiswa/add', [PageController::class, 'toAddMahasiswa'])->name('toAddMahasiswa');
    Route::get('/dashboard/mahasiswa/edit/{id}', [PageController::class, 'toEditMahasiswa'])->name('toEditMahasiswa');
    Route::put('/dashboard/mahasiswa/{id}', [PageController::class, 'EditMahasiswa'])->name('EditMahasiswa');
    Route::delete('/dashboard/mahasiswa/{id}', [PageController::class, 'DeleteMahasiswa'])->name('DeleteMahasiswa');
    Route::post('/dashboard/mahasiswa/add', [PageController::class, 'AddMahasiswa'])->name('AddMahasiswa');

});


require __DIR__.'/auth.php';
