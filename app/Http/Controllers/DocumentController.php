<?php

namespace App\Http\Controllers;

use Livewire\WithPagination;

class DocumentController extends Controller
{
    use WithPagination;
    
    public function index()  {
        return view('public.dokumen');
    }

}
