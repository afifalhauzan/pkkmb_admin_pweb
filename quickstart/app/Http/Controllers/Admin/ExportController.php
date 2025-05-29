<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel; // Import the Excel Facade
use App\Exports\KegiatanExport;     // Import your export classes
use App\Exports\AbsensiExport;
use App\Exports\TugasExport;

class ExportController extends Controller
{
    /**
     * Export all Kegiatan data to Excel.
     * PIT-UR-07
     */
    public function exportKegiatan()
    {
        return Excel::download(new KegiatanExport, 'data_kegiatan_pkkmb.xlsx');
    }

    /**
     * Export all Absensi data to Excel.
     * PIT-UR-07
     */
    public function exportAbsensi()
    {
        return Excel::download(new AbsensiExport, 'data_absensi_pkkmb.xlsx');
    }

    /**
     * Export all Tugas (submitted tasks) data to Excel.
     * PIT-UR-07
     */
    public function exportTugas()
    {
        return Excel::download(new TugasExport, 'data_tugas_pkkmb.xlsx');
    }
}