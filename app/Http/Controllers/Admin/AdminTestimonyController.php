<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class AdminTestimonyController extends Controller
{
    use WithPagination;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.adminTestimoni');
    }

    public function create()
    {
        return view('admin.form.testimoniPost');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Testimony $testimony)
    {
        return view('admin.form.testimoniEdit', compact('testimony'));
    }

    public function update(Request $request, Testimony $testimony)
    {
        //
    }

    public function destroy(Testimony $testimony)
    {
        if ($testimony->image && Storage::disk('public')->exists($testimony->image)) {
            Storage::disk('public')->delete($testimony->image);
        }

        $testimony->delete();

        return redirect('/testimonies')->with('success', 'Data Berhasil Dihapus!');
    }
}
