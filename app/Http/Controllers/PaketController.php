<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari model Paket
        $pakets = Paket::all();

        // Mengirimkan data ke view 'paket.index'
        return view('paket', compact('pakets'));
    }
}
