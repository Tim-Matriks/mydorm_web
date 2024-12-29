<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Paket;
use App\Models\Helpdesk;
use App\Models\Dormitizen;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari model Paket
        $pakets = Paket::with(['dormitizen'])->paginate(10);

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
            'dormitizen_id' => 'required|exists:dormitizen,dormitizen_id', // Validasi bahwa dormitizen_id ada dalam 
            'penerima_paket' => 'required|string|max:255',
            'waktu_tiba' => 'required|date',
        ]);

        try {
            // Menyimpan data paket ke database
            Paket::create([
                'dormitizen_id' => $request->input('dormitizen_id'),
                'penerima_paket' => $request->input('penerima_paket'),
                'waktu_tiba' => $request->input('waktu_tiba'),
            ]);

            return redirect()->route('paket.index')->with('success', 'Paket berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
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

    public function searchDormitizen(Request $request)
    {
        $nomorKamar = $request->input('nomor_kamar');
        $gedungId = 1;

        // Validasi input nomor kamar
        if (!$nomorKamar) {
            return redirect()->back()->with('error', 'Nomor kamar harus diisi.');
        }

        try {
            // Query untuk mendapatkan kamar berdasarkan nomor kamar dan gedung_id
            $kamar = Kamar::where('nomor', $nomorKamar)
                ->where('gedung_id', 1)  // Pastikan ini sesuai dengan gedung yang Anda cari
                ->first(); 

            if ($kamar) {
                // Ambil data Dormitizen berdasarkan kamar_id
                $dormitizens = Dormitizen::where('kamar_id', $kamar->kamar_id)->get();
 

                if ($dormitizens->isNotEmpty()) {
                    return redirect()->back()->with([
                        'dormitizens' => $dormitizens,
                        'nomorKamar' => $nomorKamar,
                    ]);
                } else {
                    return redirect()->back()->with('error', 'Tidak ada Dormitizen ditemukan untuk kamar tersebut.');
                }
            } else {
                return redirect()->back()->with('error', 'Kamar tidak ditemukan.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
