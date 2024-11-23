<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\ValidTugas;
use App\Models\Kegiatan;
use App\Models\ValidPresensi;
use App\Models\Cluster;
use App\Models\Mahasiswa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PageController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $role = $user->role;

        $valid_tugas = ValidTugas::get(); // Adjust this query based on your requirements

        if ($role == 'QC') {
            return view('qc-dashboard', compact('valid_tugas'));
        } elseif ($role == 'PIT') {
            return view('pit-dashboard', compact('valid_tugas'));
        }


        return view('dashboard', compact('valid_tugas'));  // Default for Admin or other roles
    }

    // public function penugasan()
    // {
    //     // Fetch necessary data or process logic here
    //     return view('index'); // Return the view for Mahasiswa
    // }

    public function mahasiswa()
    {
        // Fetch necessary data or process logic here
        $clusters = Cluster::get();
        return view('mahasiswa_dashboard', compact('clusters')); // Return the view for Mahasiswa
    }

    public function absensi()
    {
        // Fetch necessary data or process logic here
        $valid_presensi = ValidPresensi::get();
        return view('absensi_dashboard', compact('valid_presensi')); // Return the view for Absensi
    }

    public function kegiatan()
    {
        // Fetch necessary data or process logic here
        $kegiatan = Kegiatan::get();
        return view('kegiatan_dashboard', compact('kegiatan')); // Return the view for Absensi
    }

    public function cekMhsCluster($cluster)
    {
        $clusters = Cluster::get();

        // Logic to fetch and display data based on the selected cluster
        $noCluster = Cluster::find($cluster); // Or your logic to fetch related data
        $clusterMahasiswa = $noCluster->mahasiswa;

        // Return a view and pass data to it
        return view('cluster_show_dashboard', compact('clusters'), compact('clusterMahasiswa'));
    }
}
