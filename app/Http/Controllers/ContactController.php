<?php

namespace App\Http\Controllers;

use App;
use App\Contact;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $new_contact = Contact::create($request->all());
        return redirect()->back()->with([$request->clients_id])->with('info', 'Le contact a bien été créée');
    }
    public function update(Request $request, Contact $contact)
    {
        $contact->update($request->all());
        return redirect()->back()->with([$request->clients_id])->with('info', 'Le contact a bien été modifié');
    }
    public function show()
    {
 		return redirect()->route('clients.index');
    }
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return back()->with('info', 'Le contact a bien été supprimé.');
    }
}
