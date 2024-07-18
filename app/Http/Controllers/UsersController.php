<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Storage;
use App\Models\Contact;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    
    public function index_user()
    {
        $contact = Contact::all();
        $orders = Order::all();
        $product = Product::all();
        $users = User::all();
        $unseenCount = $contact->where('status', 'Chưa xem')->count();
        return view('admin.index_user', compact('users','orders','product','unseenCount'));
    }

    public function edit_user($id)
    {
        $contact = Contact::all();
        $unseenCount = $contact->where('status', 'Chưa xem')->count();
        $orders = Order::all();
        $users = User::all();
        $user = User::find($id);
        return view('admin.edit_user', compact('user','users','orders','unseenCount'));
    }

    public function update_user(UserRequest $request, $id)
    {
        $user = User::find($id);
        $user->avt =str_replace("public","storage", $request->avt->store('public/img'));
        // $user->avt = $request->avt;
        $user->name = $request->name;
        $user->save();
        return redirect()->route('admin.index');
    }

    public function showAssignRoleForm()
    {
        $contact = Contact::all();
        $unseenCount = $contact->where('status', 'Chưa xem')->count();
        $orders = Order::all();
        $users = User::all();
        return view('admin.role', compact('users','orders','unseenCount'));
    }

    public function assignRole(Request $request)
    {
        $user = User::find($request->user_id);
        $user->role = $request->role;
        $user->save();
        return redirect()->route('admin.index');
    }
}
