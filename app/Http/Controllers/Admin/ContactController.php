<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }

    public function show($id)
    {
        $contact = Contact::find($id);
        return view('admin.contact.show', compact('contact'));
    }

    public function status($id)
    {
        $details = Contact::find($id);

        $details->status = true;
        $details->save();
        Toastr::success(' Contact details marked as read :)','Success');
        return redirect()->route('admin.contact.index');
    }

    public function destroy($id)
    {
        Contact::find($id)->delete();
        Toastr::success(' Contact successfully deleted :)','Success');
        return redirect()->back();

    }
}
