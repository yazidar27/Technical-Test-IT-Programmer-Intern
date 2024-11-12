<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartemen;
use App\Models\Penghuni;

class HomeController extends Controller
{
    public function index()
    {
        $apartemens = Apartemen::all();
        $penghunis = Penghuni::all();

        return view('home', compact('apartemens', 'penghunis'));
    }
}
