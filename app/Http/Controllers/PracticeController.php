<?php

namespace App\Http\Controllers;

use App\Models\Practice;

class PracticeController extends Controller
{
    public function index()  {
        return view('public.jadwalPraktek');
    }

    public function select(Practice $practice)  {
        return view('public.jadwalPraktekSelect', ['practice' => $practice]);
    }
}
