<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;

class ContactController extends Controller
{
    #=============================== INDEX
    public function index()
    {
        $contacts = Contact::paginate(4);
        return view('admin.contacts.index', get_defined_vars());
    }


    #=============================== DELETE
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return to_route('admin.contacts.index')->with('success', __('keywords.deleted_successfully'));
    }
}
