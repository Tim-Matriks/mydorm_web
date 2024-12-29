<?php

namespace App\Http\Controllers;

use App\Models\Dormitizen;


class DormitizenController extends Controller
{
    function index()
    {
        if (request('search')) {
            $searchTerm = request('search');
            $query = Dormitizen::where('nama', 'like', '%' . $searchTerm . '%')
                ->orWhere('agama', 'like', '%' . $searchTerm . '%')
                ->orWhere('prodi', 'like', '%' . $searchTerm . '%')
                ->orWhere('no_hp', 'like', '%' . $searchTerm . '%')
                ->orWhere('no_hp_ortu', 'like', '%' . $searchTerm . '%')
                ->orWhere('alamat_ortu', 'like', '%' . $searchTerm . '%');
            $data = $query->paginate(10);
        } else {
            $data = Dormitizen::paginate(10);
        }

        return view('dormitizen.index', compact('data'));
    }
}
