<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class AdminServiceController extends Controller
{
    use WithPagination;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.adminLayanan');
    }

    public function create()
    {
        return view('admin.form.layananPost');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'link' => 'required'
        ]);

        $service = Service::create($validated);

        return redirect('services')->with('success', 'Data Berhasil Dibuat!');
    }

    public function edit(Service $service)  {
        return view('admin.form.layananEdit', ['service' => $service]);
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'link' => 'required'
        ]);
    
        $service->update($validated);
    
        return redirect('services')->with('success', 'Data Berhasil Di-update!');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        // Redirect the user to another page with a success message
        return redirect('services')->with('success', 'Data Berhasil Dihapus!');
    }
}
