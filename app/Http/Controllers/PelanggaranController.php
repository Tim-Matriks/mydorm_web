<?php

namespace App\Http\Controllers;

use App\Models\Pelanggaran;
use Illuminate\Http\Request;

class PelanggaranController extends Controller
{
    public function index()
    {
        // Mengambil data pelanggaran dengan mengelompokkan berdasarkan dormitizen_id
        $pelanggarans = Pelanggaran::selectRaw('dormitizen_id, count(*) as total_pelanggaran')
            ->groupBy('dormitizen_id')
            ->with('dormitizen.kamar') // Mengambil relasi dormitizen dan kamar
            ->get();

        // Mengirimkan data ke view 'pelanggaran.index'
        return view('pelanggaran.index', compact('pelanggarans'));
    }
}
