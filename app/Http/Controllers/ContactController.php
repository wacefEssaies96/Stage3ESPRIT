<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        if(Auth::user()->type == 'Admin' || Auth::user()->type == 'Super admin'){
            return view('contact.index', [
                'contacts' => Contact::all()
            ]);
        }
        return redirect()->route('home')->with('error', 'Vous n\'avez pas l\'accées !');
    }

    public function create()
    {
        return view('contact.contact');
    }

    public function store(Request $request)
    {
        $request->validate($this->rules());
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ]);
        return redirect()->route('home')->with('success', 'Votre message à été bien enregistré.');
    }
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contact.show', ['contact' => $contact]);
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('contact.index')->with('success', 'Opération effectuée avec succès.');
    }

    public function search(Request $request){
        $contacts = Contact::where('name', 'like', '%'.$request->search.'%')->get();
        return view('contact.index', [
            'contacts' => $contacts
        ]);
    }

    public function rules()
    {
        return  [
            'message' => 'required|max:1000',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ];
    }
}
