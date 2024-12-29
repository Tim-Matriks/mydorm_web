<?php

namespace App\Http\Controllers;

use App\Models\Pelanggaran;
use Illuminate\Http\Request;

class PelanggaranController extends Controller
{
    public function index(Request $request)
    {
        // Get search query
        $query = $request->input('search');

        // Query pelanggarans deengan pagination
        $pelanggarans = Pelanggaran::with(['dormitizen.kamar']) // Eager load relationships
            ->selectRaw('dormitizen_id, count(*) as total_pelanggaran')
            ->groupBy('dormitizen_id')
            ->paginate(10); // Pagination dengan total results

        // Mengirimkan data ke view 'pelanggaran.index'
        return view('pelanggaran.index', compact('pelanggarans'));
    }
}
