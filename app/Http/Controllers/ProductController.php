<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;
use App\Models\Cart;
use Storage;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index_product()
    {
        $contact = Contact::all();
        $unseenCount = $contact->where('status', 'Chưa xem')->count();
        $orders = Order::all();
        $users = User::all();
        $products = Product::all();
        return view('admin.index_product', compact('products','users','orders','unseenCount'));
    }

    public function create_product()
    {
        $contact = Contact::all();
        $unseenCount = $contact->where('status', 'Chưa xem')->count();
        $orders = Order::all();
        $users = User::all();
        $categories = Category::all();
        return view('admin.create_product',compact('categories','users','orders','unseenCount'));
    }

    public function store_product(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->sale=$request->sale;
        $product->quantity = $request->quantity;
        $product->img =str_replace("public","storage", $request->img->store('public/img'));
        $product->category_id = $request->category_id;
        $product->save();
        return redirect()->back();
    }

    public function edit_product($id)
    {
        $contact = Contact::all();
        $unseenCount = $contact->where('status', 'Chưa xem')->count();
        $orders = Order::all();
        $users = User::all();
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.edit_product', compact('product','categories','users','orders','unseenCount'));
    }

    public function update_product(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name=$request->name;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->sale=$request->sale;
        $product->quantity=$request->quantity;
        if ($request->hasFile('img')) {
            if ($product->img) {
                $oldImagePath = str_replace("storage", "public", $product->img);
                Storage::delete($oldImagePath);
            }
            $product->img = str_replace("public", "storage", $request->img->store('public/img'));
        }
        $product->category_id=$request->category_id;
        $product->save();
        return redirect()->route('index_product');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('index_product');
    }

    public function search(Request $request)
    {
        $cartItems = Cart::all();
        $orders = Order::all();
        $users = User::all();
        $searchTerm = $request->input('search');
        $products = Product::where('name', 'like', '%'.$searchTerm.'%')->paginate(10);
        return view('home.products', ['products' => $products,'searchTerm' => $searchTerm,'cartItems'=>$cartItems]);
    }

    public function admin_search(Request $request)
    {
        $contact = Contact::all();
        $unseenCount = $contact->where('status', 'Chưa xem')->count();
        $orders = Order::all();
        $query = $request->input('query');
        $products = Product::where('name', 'LIKE', "%{$query}%")->get();
        return view('admin.index_product', compact('products','orders','unseenCount'));
    }

    
}
