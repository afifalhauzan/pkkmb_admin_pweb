<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
    use HasFactory;
    protected $table = 'clusters';

    protected $primaryKey = 'Cluster_ID';
    public $incrementing = true;

    protected $fillable = ['Cluster_ID', 'Admin_NIM'];

    // Relationships
    public function admin()
    {
        return $this->belongsTo(User::class, 'Admin_NIM', 'NIM');
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'Cluster_ID', 'Cluster_ID');
    }

    
}
