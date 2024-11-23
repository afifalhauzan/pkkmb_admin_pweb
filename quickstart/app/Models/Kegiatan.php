<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $table = 'kegiatan';
    protected $primaryKey = 'ID_Kegiatan';
    public $incrementing = true;

    protected $fillable = ['ID_Kegiatan', 'Admin_NIM', 'Nama', 'Tahun'];

    // Relationships
    public function admin()
    {
        return $this->belongsTo(User::class, 'Admin_NIM', 'NIM');
    }

    public function validPresensi()
    {
        return $this->hasMany(ValidPresensi::class, 'Kegiatan_ID', 'ID_Kegiatan');
    }

    public function presensi()
    {
        return $this->hasMany(Presensi::class, 'Kegiatan_ID', 'ID_Kegiatan');
    }

    
}

