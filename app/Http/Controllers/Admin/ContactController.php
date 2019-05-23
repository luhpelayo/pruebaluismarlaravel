<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{

    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contact.index',compact('contacts'));
    }


    public function show($id)
    {
        $contact = Contact::find($id);
        return view('admin.contact.show',compact('contact'));
    }


    public function destroy($id)
    {
        $deleted = Contact::find($id)->delete();
        $message = $deleted ? 'Contacto eliminado correctamente!' : 'El Contacto NO pudo eliminarse!';
        
        return redirect()->route('contact.index')->with('message', $message);
    }
}
