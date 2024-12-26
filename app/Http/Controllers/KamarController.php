<?php

namespace App\Http\Controllers;

use App\Models\Dormitizen;
use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\Paket;

class KamarController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari model Kamar
        $kamars = Kamar::all();

        // Mengirimkan data ke view 'kamar.index'
        return view('kamar.kamar', compact('kamars'));
    }

    public function detail($id)
    {
        // Mengambil semua data dari model Paket
        $dormitizens = Dormitizen::where('kamar_id', $id)->get();

        // Mengirimkan data ke view 'kamar.index'
        return view('kamar.detailKamar', compact('dormitizens'));
    }
}
