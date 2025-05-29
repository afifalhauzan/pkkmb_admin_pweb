<?php

namespace App\Exports;

use App\Models\Kegiatan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings; // Add this

class KegiatanExport implements FromCollection, WithHeadings // Add WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Fetch all Kegiatan data
        return Kegiatan::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        // Define column headers
        return [
            'ID',
            'Admin NIM',
            'Nama Kegiatan',
            'Tahun',
            'Created At', // Assuming these are from timestamps
            'Updated At', // Assuming these are from timestamps
        ];
    }
}