<?php

namespace App\Http\Controllers;

use App\Models\Thesis;

class ThesisController extends Controller
{
    public function index()  {
        return view('public.jadwalSkripsi');
    }

    public function select(Thesis $thesis)  {
        return view('public.jadwalSkripsiSelect', ['thesis' => $thesis]);
    }
}
