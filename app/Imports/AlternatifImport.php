<?php

namespace App\Imports;

use App\Models\Alternatif;
use App\Models\Penilaian;
use App\Models\Kriteria;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AlternatifImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $rows
     */
    public function collection(Collection $rows)
    {
        $kriterias = Kriteria::all();
        
        foreach ($rows as $row) {
            // Skip if name is empty
            if (empty($row['nama'])) {
                continue;
            }

            // Create Alternatif
            $alternatif = Alternatif::create([
                'nama_siswa' => $row['nama'],
            ]);

            // Save ratings for each criteria
            foreach ($kriterias as $kriteria) {
                $kode = strtolower($kriteria->kode_kriteria); // e.g., 'c1'
                
                // Get value from row, default to 0 if not set
                $nilai = isset($row[$kode]) ? $row[$kode] : 0;

                Penilaian::create([
                    'id_alternatif' => $alternatif->id_alternatif,
                    'id_kriteria' => $kriteria->id_kriteria,
                    'nilai' => $nilai,
                ]);
            }
        }
    }
}
