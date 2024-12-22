<?php

namespace App\Http\Controllers;

use App\Models\Pelanggaran;
use Illuminate\Http\Request;

class PelanggaranController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari model Pelanggaran dengan pagination
        $pelanggarans = Pelanggaran::with('dormitizen')->paginate(9);

        // Mengirimkan data ke view 'pelanggaran.index'
        return view('pelanggaran', compact('pelanggarans'));
    }
}
