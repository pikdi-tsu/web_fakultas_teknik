<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Livewire\WithPagination;

class InformationController extends Controller
{
    use WithPagination;
    
    public function index()  {
        return view('public.pusatInformasi');
    }

    public function select(Information $information)  {
        return view('public.pusatInformasiSelected', ['information' => $information]);
    }
}
