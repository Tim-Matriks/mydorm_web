<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari model Berita
        $beritas = Berita::paginate(9);

        // Mengirimkan data ke view 'paket.index'
        return view('berita', compact('beritas'));
    }
}
