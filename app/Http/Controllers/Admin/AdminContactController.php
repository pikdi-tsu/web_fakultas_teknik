<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Help;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.adminKontak');
    }

    public function create()
    {
        return view('admin.form.kontakPost');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'label' => 'required',
            'link' => 'required'
        ]);

        $contact = Contact::create($validated);

        return redirect('contacts')->with('success', 'Data Berhasil Dibuat!');
    }

    public function edit(Contact $contact)  {
        return view('admin.form.kontakEdit', ['contact' => $contact]);
    }

    public function update(Request $request, Contact $contact)
    {
        $validated = $request->validate([
            'label' => 'required',
            'link' => 'required'
        ]);
    
        $contact->update($validated);
    
        return redirect('contacts')->with('success', 'Data Berhasil Di-update!');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect('contacts')->with('success', 'Data Berhasil Dihapus!');
    }

    public function updateHelp(Request $request, Help $help)
    {
        $validated = $request->validate([
            'number' => 'required|numeric'
        ]);
    
        $help->update($validated);
    
        return redirect('contacts')->with('success', 'Data Berhasil Di-update!');
    }
}
