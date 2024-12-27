<?php

namespace App\Http\Controllers;

use App\Models\Dormitizen;
use Illuminate\Http\Request;

class DormitizenController extends Controller
{
    function index()
    {
        $data = Dormitizen::all();
        return view('dormitizen.index', compact('data'));
    }
}
