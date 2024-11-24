<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\ValidTugas;
use App\Models\Kegiatan;
use App\Models\ValidPresensi;
use App\Models\Cluster;
use App\Models\Mahasiswa;
use App\Models\Tugas;
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

    public function QCmahasiswa()
    {
        // Fetch necessary data or process logic here
        $clusters = Cluster::get();
        return view('QC View/QCmahasiswa_dashboard', compact('clusters')); // Return the view for Mahasiswa
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

    public function QCViewTugas($id_tugas)
    {
        
        // Optionally, fetch the data for the specific assignment
        $tugas = ValidTugas::find($id_tugas);

        // Pass the data to the view
        return view('QC View/QCpenugasan_view_dashboard', compact('tugas'));
    }

    public function toEditMahasiswa($nim)
    {
        $clusters = Cluster::get();

        $mahasiswa = Mahasiswa::find($nim); // Fetch the mahasiswa based on the ID

        if (!$mahasiswa) {
            abort(404, 'Mahasiswa not found'); // Handle case where the mahasiswa does not exist
        }

        return view('mahasiswa_edit_dashboard', compact('clusters'), compact('mahasiswa'));
    }

    public function toAddMahasiswa()
    {
        // Get all clusters
        $clusters = Cluster::get();

        // Return view for adding mahasiswa
        return view('mahasiswa_add_dashboard', compact('clusters'));
    }

    public function toAddAbsensi()
    {
        $kegiatan = Kegiatan::all();

        // Return view for adding mahasiswa
        return view('absensi_add_dashboard', compact('kegiatan'));
    }

    public function toAddKegiatan(Request $request)
    {
        return view('kegiatan_add_dashboard');
    }

    public function addKegiatan(Request $request)
    {
        $admin_nim = auth()->user()->nim;
        $kegiatan = Kegiatan::get();

        $request->validate([
            'nama' => 'required|string|max:255',
            'tahun' => 'required|integer|min:2000|max:' . date('Y'),
        ]);

        Kegiatan::create([
            'Admin_NIM' => $admin_nim,
            'Nama' => $request->input('nama'),
            'Tahun' => $request->input('tahun'),
        ]);
        // Return view for adding mahasiswa
        return view('kegiatan_dashboard', compact('admin_nim', 'kegiatan'));
    }

    public function addAbsensi(Request $request)
    {
        //dd($request->all());
        // Validate the incoming request
        $validated = $request->validate([
            'kode_presensi' => 'required|string|max:255',
            'kegiatan_id' => 'required|exists:kegiatan,ID_Kegiatan', // Ensure kegiatan_id is valid
            'description' => 'required|string|max:1000',
        ]);

        // Create a new ValidPresensi record
        ValidPresensi::create([
            'Kode_Presensi' => $validated['kode_presensi'],
            'Kegiatan_ID' => $validated['kegiatan_id'],
            'Description' => $validated['description'],
        ]);

        // Redirect back to the default page with a success message
        return redirect()->route('absensi')->with('success', 'Presensi berhasil ditambahkan.');
    }

    public function AddMahasiswa(Request $request)
    {
        // Fetch clusters for the form
        $clusters = Cluster::get();

        // Validate the request data
        $validatedData = $request->validate([
            'nim' => 'required|string|max:15|unique:mahasiswa,NIM',
            'nama' => 'required|string|max:255',
            'cluster_id' => 'required|integer|exists:clusters,Cluster_ID', // Ensure correct reference to Cluster_ID
            'prodi' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:mahasiswa,email',
        ]);

        // Create a new Mahasiswa record with validated data
        Mahasiswa::create([
            'NIM' => $validatedData['nim'],
            'Nama' => $validatedData['nama'],
            'Cluster_ID' => $validatedData['cluster_id'],
            'Prodi' => $validatedData['prodi'],
            'Email' => $validatedData['email'],
            'Admin_NIM' => auth()->user()->nim, // Automatically assign the Admin_NIM from the logged-in user
        ]);

        // Redirect or return a view with a success message
        return redirect()->route('mahasiswa')->with('success', 'Mahasiswa added successfully');
    }


    public function EditMahasiswa(Request $request, $nim)
    {
        // Find the Mahasiswa record by its NIM
        $mahasiswa = Mahasiswa::find($nim);

        $clusters = Cluster::get();

        // If the Mahasiswa does not exist, return a 404 error
        if (!$mahasiswa) {
            abort(404, 'Mahasiswa not found');
        }

        // Validate the request data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'cluster_id' => 'required|integer|exists:clusters,cluster_id', // Ensures cluster_id exists in the clusters table
            'prodi' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:mahasiswa,email,' . $nim . ',NIM', // Allow the current mahasiswa email
        ]);

        // Update the Mahasiswa record with validated data
        // Manually update the Mahasiswa attributes
        $mahasiswa->nama = $validatedData['nama'];
        $mahasiswa->cluster_id = $validatedData['cluster_id'];
        $mahasiswa->prodi = $validatedData['prodi'];
        $mahasiswa->email = $validatedData['email'];

        // Save the updated Mahasiswa record
        $mahasiswa->save();

        return view('mahasiswa_dashboard', compact('clusters'));
    }

    public function cekMhsCluster($cluster)
    {
        $clusters = Cluster::get();

        // Logic to fetch and display data based on the selected cluster
        $noCluster = Cluster::find($cluster); // Or your logic to fetch related data
        $mahasiswa = Mahasiswa::get();
        $clusterMahasiswa = $noCluster->mahasiswa;

        // Return a view and pass data to it
        return view('cluster_show_dashboard', compact('clusters'), compact('clusterMahasiswa'), compact('mahasiswa'));
    }

    public function DeleteMahasiswa($nim)
    {
        // Find the Mahasiswa record by its NIM
        $mahasiswa = Mahasiswa::find($nim);

        // If the Mahasiswa does not exist, return a 404 error
        if (!$mahasiswa) {
            abort(404, 'Mahasiswa not found');
        }

        // Get the cluster_id before deleting the mahasiswa
        $clusterId = $mahasiswa->Cluster_ID;

        // Delete the Mahasiswa record
        $mahasiswa->delete();

        // Redirect to the mahasiswa list for the same cluster
        return redirect()->route('cluster.show', ['cluster' => $clusterId])
            ->with('success', 'Mahasiswa deleted successfully');
    }

    public function toAddPenugasan()
    {
        $user = auth()->user();
        $kegiatan = Kegiatan::all();

        $valid_tugas = ValidTugas::get(); // Adjust this query based on your requirements

        return view('penugasan_add_dashboard', compact('valid_tugas'), compact('kegiatan'));  // Default for Admin or other roles
    }

    public function AddPenugasan(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        // Save the data to the database
        ValidTugas::create([
            'Judul' => $validatedData['judul'],
            'Deskripsi' => $validatedData['deskripsi'],
        ]);

        // Redirect to the index method of PageController
        return redirect()->action([PageController::class, 'index'])
            ->with('success', 'Penugasan berhasil ditambahkan.');
    }
}
