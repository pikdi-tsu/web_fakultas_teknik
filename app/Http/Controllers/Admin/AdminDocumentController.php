<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class AdminDocumentController extends Controller
{
    use WithPagination;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.adminDokumen');
    }

    public function create()
    {
        return view('admin.form.dokumenPost');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'link' => 'required'
        ]);

        Document::create($validated);

        return redirect('/document')->with('success', 'Data Berhasil Dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(Document $document)  {
        return view('admin.form.dokumenEdit', ['document' => $document]);
    }

    public function update(Request $request, Document $document)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'link' => 'required'
        ]);
    
        $document->update($validated);
    
        return redirect('/document')->with('success', 'Data Berhasil Di-update!');
    }

    public function destroy(Document $document)
    {
        $document->delete();

        return redirect('/document')->with('success', 'Data Berhasil Dihapus!');
    }
}
