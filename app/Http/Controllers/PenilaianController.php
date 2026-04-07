<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class PenilaianController extends Controller {

    public function index() {
        $alternatifs = Alternatif::with(['penilaian' => function ($query) {
            $query->join('tabel_kriteria', 'tabel_penilaian.id_kriteria', '=', 'tabel_kriteria.id_kriteria')
                ->orderBy('tabel_kriteria.id_kriteria');
        }])->get();
        
        $kriterias = Kriteria::all();

        return view('penilaian.index', compact('alternatifs', 'kriterias'));
    }

    public function create() {
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::all();
        return view('penilaian.create', compact('alternatifs', 'kriterias'));
    }

    public function store(Request $request) {
        $request->validate([
            'id_alternatif' => 'required|exists:tabel_alternatif,id_alternatif',
            'nilai' => 'required|array',
        ]);

        $id_alternatif = $request->id_alternatif;

        Penilaian::where('id_alternatif', $id_alternatif)->delete();

        foreach ($request->nilai as $id_kriteria => $nilai) {
            Penilaian::create([
                'id_alternatif' => $id_alternatif,
                'id_kriteria' => $id_kriteria,
                'nilai' => $nilai,
            ]);
        }

        return redirect()->route('penilaian.index')->with('success', 'Data Penilaian berhasil disimpan.');
    }

    public function edit(Alternatif $alternatif) {
        return redirect()->route('penilaian.create', ['alternatif_id' => $alternatif->id_alternatif]);
    }

    public function destroy($id_alternatif) {
        try {
            Penilaian::where('id_alternatif', $id_alternatif)->delete();
        } catch (\Exception $e) {
            return redirect()->route('penilaian.index')->with('error', 'Gagal hapus.');
        }
        return redirect()->route('penilaian.index')->with('success', 'Berhasil hapus.');
    }
}
