<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValidTugas extends Model
{
    use HasFactory;
    protected $table = 'valid_tugas';

    protected $primaryKey = 'ID_Tugas';
    public $incrementing = true;

    protected $fillable = ['Judul', 'Deskripsi', 'Admin_NIM'];

    // Relationships
    public function admin()
    {
        return $this->belongsTo(User::class, 'Admin_NIM', 'NIM');
    }

    public function tugas()
    {
        return $this->hasMany(Tugas::class, 'ID_Tugas', 'ID_Tugas');
    }
}
