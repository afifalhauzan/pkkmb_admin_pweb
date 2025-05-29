<?php

namespace App\Exports;

use App\Models\Tugas; // Use the Tugas model (for submitted tasks)
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings; // Add this
use Maatwebsite\Excel\Concerns\WithMapping; // Add this

class TugasExport implements FromCollection, WithHeadings, WithMapping // Add WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Fetch all submitted Tugas data, eager load related Mahasiswa and ValidTugas
        return Tugas::with('mahasiswa', 'validTugas')->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        // Define column headers
        return [
            'ID Tugas Submit',
            'NIM Mahasiswa',
            'Nama Mahasiswa', // Custom heading
            'ID Valid Tugas',
            'Judul Tugas (Valid)', // Custom heading
            'File Tugas (Link)',
            'Nilai',
            'Feedback', // text_feedback column
            'Waktu Pengumpulan', // time_submission column
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
            $row->Mahasiswa_NIM,
            $row->mahasiswa->Nama ?? 'N/A', // Get Mahasiswa name
            $row->ID_Tugas,
            $row->validTugas->Judul ?? 'N/A', // Get Valid Tugas Judul
            $row->File_Tugas,
            $row->Nilai,
            $row->text_feedback,
            $row->time_submission ? $row->time_submission->format('Y-m-d H:i:s') : '', // Format datetime
            $row->created_at ? $row->created_at->format('Y-m-d H:i:s') : '',
            $row->updated_at ? $row->updated_at->format('Y-m-d H:i:s') : '',
        ];
    }
}