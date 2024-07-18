<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CartRequest;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
        return view('cart.index', compact('cartItems'));
    }
    
    public function add(Request $request, $productId)
    {
        $user = Auth::user();
        $cartItem = Cart::where('user_id', $user->id)
                        ->where('product_id', $productId)
                        ->where('size', $request->size)
                        ->first();
        if ($cartItem) {
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            $cartItem = new Cart();
            $cartItem->user_id = $user->id;
            $cartItem->product_id = $productId;
            $cartItem->size = $request->size;
            $cartItem->sale = $request->sale;
            $cartItem->quantity = $request->quantity;
            $cartItem->price = $request->price; 
            $cartItem->img = $request->img; 
            $cartItem->save();
        }
        return redirect()->route('cart.index');
    }
    

    public function remove($id)
    {
        $cartItem = Cart::find($id);
        if ($cartItem && $cartItem->user_id == Auth::id()) {
            $cartItem->delete();
            return redirect()->route('cart.index')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
        }

        return redirect()->route('cart.index')->with('error', 'Không thể xóa sản phẩm này.');
    }


    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $cartItem = Cart::where('user_id', $user->id)->find($id);
        if (!$cartItem) {
            return redirect()->route('cart.index')->with('error', 'Sản phẩm không tồn tại trong giỏ hàng.');
        }
        $cartItem->quantity = $request->quantity;
        $cartItem->save();
        return redirect()->route('cart.index')->with('success', 'Số lượng sản phẩm đã được cập nhật thành công.');
    }

    public function check(Request $request)
    {
        $cartItems = Cart::where('user_id', Auth::id())
                 ->with(['product', 'size'])
                 ->get();
        return view('cart.check', compact('cartItems'));
    }

    public function store(CartRequest $request)
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        // return $cartItems;
        $order = new Order();
        $order->name = $request->name;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->phone = $request->phone;
        $order->user_id = Auth::id();
        $order->total_price = $request->cost;
        $order->status = 'chờ xác nhận';
        $order->save();

        foreach ($cartItems as $item) {
            
            $orderItem = new OrderItem();
            $orderItem->size_id = null;
            if ($item->size == 's') {
                $orderItem->size_id = 1;
            } elseif($item->size == 'm') {
                $orderItem->size_id = 2;
            }elseif($item->size == 'l') {
                $orderItem->size_id = 3;
            }else{
                $orderItem->size_id = 4;
            }
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item->product_id;
            // $orderItem->size_id = $item->size;
            $orderItem->quantity = $item->quantity;
            $orderItem->price = $item->price;
            $orderItem->save();
        }
        Cart::where('user_id', Auth::id())->delete();
        return redirect()->route('home.products');
    }
}
