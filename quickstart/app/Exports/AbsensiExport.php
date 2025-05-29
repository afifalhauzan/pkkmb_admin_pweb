<?php

namespace App\Exports;

use App\Models\Presensi; // Use the Presensi model
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings; // Add this
use Maatwebsite\Excel\Concerns\WithMapping; // Add this for custom data mapping

class AbsensiExport implements FromCollection, WithHeadings, WithMapping // Add WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Fetch all Presensi data, eager load related Mahasiswa and Kegiatan
        return Presensi::with('mahasiswa', 'kegiatan')->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        // Define column headers
        return [
            'ID Presensi',
            'Kode Presensi',
            'Admin NIM',
            'NIM Mahasiswa',
            'Nama Mahasiswa', // Custom heading
            'ID Kegiatan',
            'Nama Kegiatan', // Custom heading
            'Waktu Presensi',
            'Status', // Assuming a status column
            'Created At',
            'Updated At',
        ];
    }

    /**
     * @param mixed $row
     *
     * @return array
     */
    public function map($row): array
    {
        // Map the model attributes to the export columns
        return [
            $row->ID,
            $row->Kode_Presensi,
            $row->Admin_NIM,
            $row->Mahasiswa_NIM,
            $row->mahasiswa->Nama ?? 'N/A', // Get Mahasiswa name
            $row->Kegiatan_ID,
            $row->kegiatan->Nama ?? 'N/A', // Get Kegiatan name
            $row->Waktu_Presensi->format('Y-m-d H:i:s'), // Format datetime
            $row->Status ?? 'Hadir', // Assuming a Status column in Presensi
            $row->created_at ? $row->created_at->format('Y-m-d H:i:s') : '',
            $row->updated_at ? $row->updated_at->format('Y-m-d H:i:s') : '',
        ];
    }
}