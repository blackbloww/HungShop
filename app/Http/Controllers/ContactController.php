<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Order;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->status='Chưa xem';
        $contact->save();
        return redirect()->back();
    }

    public function index()
    {
        $contact = Contact::all();
        $unseenCount = $contact->where('status', 'Chưa xem')->count();
        $orders = Order::all();
        $contact = Contact::all();
        return view('admin.index_contact',compact('contact','orders','unseenCount'));
    }

    public function updateContact(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->status = $request->input('status');
        $contact->save();
        return redirect()->back();
    }
}
