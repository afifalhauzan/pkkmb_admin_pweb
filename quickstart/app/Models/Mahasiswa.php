<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';

    protected $primaryKey = 'NIM';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['NIM', 'Admin_NIM', 'Cluster_ID', 'Nama', 'Prodi', 'Email'];

    // Relationships
    public function admin()
    {
        return $this->belongsTo(User::class, 'Admin_NIM', 'NIM');
    }

    public function cluster()
    {
        return $this->belongsTo(Cluster::class, 'Cluster_ID', 'Cluster_ID');
    }

    public function tugas()
    {
        return $this->hasMany(Tugas::class, 'Mahasiswa_NIM', 'NIM');
    }

    public function presensi()
    {
        return $this->hasMany(Presensi::class, 'Mahasiswa_NIM', 'NIM');
    }
}
