<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use App\Models\Cart;

class FavoriteController extends Controller
{
    public function index()
    {
        $cartItems = Cart::all();
        $favoriteProducts = auth()->user()->favorites; 
        return view('home.favorite', ['favoriteProducts' => $favoriteProducts,'cartItems'=>$cartItems]);
    }

    public function add(Request $request)
    {
        $user = Auth::user();
        $productId = $request->input('product_id');

        if ($user && $productId) {
            if ($user->favorites()->where('product_id', $productId)->exists()) {
                return response()->json(['message' => 'Sản phẩm đã có trong danh sách yêu thích của bạn.'], 400);
            }
            Favorite::create([
                'user_id' => $user->id,
                'product_id' => $productId,
            ]);
            return response()->json(['message' => 'Sản phẩm đã được thêm vào danh sách yêu thích.']);
        }
        return response()->json(['message' => 'Không thể thêm sản phẩm vào danh sách yêu thích.'], 400);
    }

    public function toggleFavorite(Request $request)
    {
        $productId = $request->input('product_id');
        $user = Auth::user();
        if ($user) {
            $favorite = $user->favorites()->where('product_id', $productId)->first();
            
            if ($favorite) {
                $favorite->delete();
                return response()->json(['message' => 'Đã hủy yêu thích']);
            } else {
                $user->favorites()->create(['product_id' => $productId]);
                return response()->json(['message' => 'Đã thêm vào danh sách yêu thích']);
            }
        } else {
            return response()->json(['message' => 'Bạn cần đăng nhập để thêm sản phẩm vào danh sách yêu thích.'], 401);
        }
    }
    
}
