<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValidPresensi extends Model
{
    use HasFactory;
    protected $table = 'valid_presensi';

    protected $primaryKey = 'ID';
    public $incrementing = true;

    protected $fillable = ['Kode_Presensi', 'Kegiatan_ID', 'Description'];

    // Relationships
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'Kegiatan_ID', 'ID_Kegiatan');
    }

    public function presensi()
    {
        return $this->hasMany(Presensi::class, 'Kode_Presensi', 'Kode_Presensi');
    }
}
