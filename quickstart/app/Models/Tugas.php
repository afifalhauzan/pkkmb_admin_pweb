<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    protected $table = 'tugas';

    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [
        'Mahasiswa_NIM',
        'ID_Tugas',
        'File_Tugas',
        'Nilai',
        'text_feedback', // Add this line
        'time_submission', // Add this line
    ];

    // Cast the time_submission attribute to a datetime object
    protected $casts = [
        'time_submission' => 'datetime',
    ];

    // Relationships
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'Mahasiswa_NIM', 'NIM');
    }

    public function validTugas()
    {
        return $this->belongsTo(ValidTugas::class, 'ID_Tugas', 'ID_Tugas');
    }
}
