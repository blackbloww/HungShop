<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Command;
use App\Models\Category;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $cartItems = Cart::all();
        $userFavorites = [];

        if (Auth::check()) {
            $userFavorites = Auth::user()->favorites()->pluck('product_id')->toArray();
        }

            $productsCategory1 = Product::where('category_id',1)
                                        ->orderBy('created_at', 'desc')
                                        ->take(5)
                                        ->get();
            
            $productsCategory2 = Product::where('category_id', 2)
                                        ->orderBy('created_at', 'desc')
                                        ->take(5)
                                        ->get();
            
            $productsCategory3 = Product::where('category_id', 3)
                                        ->orderBy('created_at', 'desc')
                                        ->take(5)
                                        ->get();

            $products = Product::orderBy('created_at', 'desc')
                                        ->take(4)
                                        ->get();

            return view('home.index', compact('productsCategory1', 'productsCategory2', 'productsCategory3','products','cartItems','userFavorites'));
    }
    public function nav()
    {
        $userFavorites = [];

        if (Auth::check()) {
            $userFavorites = Auth::user()->favorites()->pluck('product_id')->toArray();
        }
        // $commands = Command::all();
        $cartItems = Cart::all();
        return view('home.user', compact('cartItems','userFavorites'));
    }

    public function show($id)
    {
        $userFavorites = [];

        if (Auth::check()) {
            $userFavorites = Auth::user()->favorites()->pluck('product_id')->toArray();
        }
        $commands = Command::all();
        $cartItems = Cart::all();
        $product = Product::findOrFail($id);
        return view('home.detail', compact('product','cartItems','commands','userFavorites'));
    }

    public function products()
    {
        $userFavorites = [];

        if (Auth::check()) {
            $userFavorites = Auth::user()->favorites()->pluck('product_id')->toArray();
        }
        $cartItems = Cart::all();
        $products = Product::paginate(8);
        return view('home.products',compact('products','cartItems','userFavorites'));
    }

    public function sort(Request $request)
    {
        $userFavorites = [];
    
        if (Auth::check()) {
            $userFavorites = Auth::user()->favorites()->pluck('product_id')->toArray();
        }
    
        $cartItems = Cart::all();
        $sortField = $request->query('field', 'price');
        $sortOrder = $request->query('sort', 'asc');
        $direction = ($sortOrder === 'asc') ? 'asc' : 'desc';
        $products = Product::orderBy($sortField, $direction)->paginate(8);
        $products->appends($request->query());
        return view('home.products', compact('products', 'cartItems', 'userFavorites'));
    }
    
    public function productsByCategory($name)
    {
        $userFavorites = [];
        if (Auth::check()) {
            $userFavorites = Auth::user()->favorites()->pluck('product_id')->toArray();
        }
        $cartItems = Cart::all();
        $products = Product::where('category_id', $name)->paginate(8);
        return view('home.products', compact('products', 'cartItems', 'userFavorites'));
    }
    
    
}
