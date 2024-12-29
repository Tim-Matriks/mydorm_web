<?php

namespace App\Http\Controllers;

use App\Models\Dormitizen;
use Illuminate\Http\Request;


class DormitizenController extends Controller
{
    function index()
    {
        $data = Dormitizen::paginate(10);
        return view('dormitizen.index', compact('data'));
    }
}
