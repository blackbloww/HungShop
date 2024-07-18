<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;
use App\Models\Contact;

class CategoryController extends Controller
{
    public function index()
    {
        $contact = Contact::all();
        $orders = Order::all();
        $users = User::all();
        $categories = Category::all();
        $unseenCount = $contact->where('status', 'Chưa xem')->count();
        return view('admin.index_category', compact('categories','users','orders','unseenCount'));
    }

    public function create()
    {
        $contact = Contact::all();
        $unseenCount = $contact->where('status', 'Chưa xem')->count();
        $orders = Order::all();
        $users = User::all();
        return view('admin.create_category',compact('users','orders','unseenCount'));
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        return redirect()->back();
    }

    public function edit(Category $category)
    {
        $contact = Contact::all();
        $unseenCount = $contact->where('status', 'Chưa xem')->count();
        $orders = Order::all();
        $users = User::all();
        return view('admin.edit_category', compact('category','users','orders','unseenCount'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category->update($request->all());

        return redirect()->route('index_category')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('index_category')->with('success', 'Category deleted successfully.');
    }
}
