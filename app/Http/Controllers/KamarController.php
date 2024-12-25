<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;

class KamarController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari model Kamar
        $kamars = Kamar::all();

        // Mengirimkan data ke view 'kamar.index'
        return view('kamar', compact('kamars'));
    }
}
