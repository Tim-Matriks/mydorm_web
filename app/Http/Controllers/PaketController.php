<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari model Paket
        $pakets = Paket::with(['dormitizen'])->paginate(6);

        // Mengirimkan data ke view 'paket.index'
        return view('paket.index', compact('pakets'));
    }

    public function create()
    {
        return view('paket.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_penerima' => 'required|string|max:255',
            'penyerahan_paket' => 'required|string|max:255',
            'kamar' => 'required|string|max:255',
            'waktu_tiba' => 'required|date',
            'status_pengambilan' => 'required|string|max:50',
        ]);

        // Menyimpan data paket ke database
        Paket::create($request->all());

        return redirect()->route('paket.index')->with('success', 'Paket berhasil ditambahkan');
    }

    public function edit(Paket $paket)
    {
        return view('paket.edit', compact('paket'));
    }

    public function update(Request $request, Paket $paket)
    {
        // Validasi input
        $request->validate([
            'nama_penerima' => 'required|string|max:255',
            'penyerahan_paket' => 'required|string|max:255',
            'kamar' => 'required|string|max:255',
            'waktu_tiba' => 'required|date',
            'status_pengambilan' => 'required|string|max:50',
        ]);

        // Mengupdate data paket
        $paket->update($request->all());

        return redirect()->route('paket.index')->with('success', 'Paket berhasil diupdate');
    }

    public function destroy(Paket $paket)
    {
        // Menghapus paket
        $paket->delete();

        return redirect()->route('paket.index')->with('success', 'Paket berhasil dihapus');
    }
}
