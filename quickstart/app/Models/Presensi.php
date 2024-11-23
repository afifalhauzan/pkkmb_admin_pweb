<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;
    protected $table = 'presensi';

    protected $primaryKey = 'ID';
    public $incrementing = true;

    protected $fillable = ['Kode_Presensi', 'Admin_NIM', 'Mahasiswa_NIM', 'Kegiatan_ID', 'Waktu_Presensi'];

    // Relationships
    public function admin()
    {
        return $this->belongsTo(User::class, 'Admin_NIM', 'NIM');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'Mahasiswa_NIM', 'NIM');
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'Kegiatan_ID', 'ID_Kegiatan');
    }

    public function validPresensi()
    {
        return $this->belongsTo(ValidPresensi::class, 'Kode_Presensi', 'Kode_Presensi');
    }
}
