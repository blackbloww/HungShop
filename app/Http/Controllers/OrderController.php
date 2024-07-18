<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Cart;
use App\Models\Command;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function orders()
    {
        $contact = Contact::all();
        $users = User::all();
        $orders = Order::with('user', 'orderItems.product')->get();
        $unseenCount = $contact->where('status', 'Chưa xem')->count();
        return view('order.index', compact('orders','users','unseenCount'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->input('status');
        $order->save();
        return redirect()->back();
    }

    public function information(Request $request)
    {
        $cartItems = Cart::all();
        $user = auth()->user();
        
        $orders = Order::with('user', 'orderItems.product', 'orderItems.size')
                        ->where('user_id', $user->id)
                        ->get();
        
        return view('product/information', compact('orders','cartItems'));
    }

    public function cancel(Request $request, $id)
    {
        $order = Order::with('orderItems.product')->findOrFail($id);
        foreach ($order->orderItems as $item) {
            $product = $item->product;
            $product->quantity += $item->quantity;
            $product->save();
        }
        $order->status = 'Đã hủy';
        $order->save();
        return redirect()->back()->with('success', 'Order has been canceled and quantities have been updated.');
    }

    public function showReviewForm($id, $product_id)
    {
        $cartItems = Cart::all();
        $order = Order::findOrFail($id);
        $product = $order->orderItems()->where('product_id', $product_id)->firstOrFail();
        return view('order.review', compact('order', 'product','cartItems'));
    }

    public function submitReview(Request $request, $order_id, $product_id)
    {
        $order = Order::findOrFail($order_id);
        $product = $order->orderItems()->where('product_id', $product_id)->firstOrFail();
        $command = new Command();
        $command->user_id=Auth::user()->id;
        $command->product_id = $product_id;
        $command->quantity = $product->quantity;
        $command->rating = $request->rating;
        $command->order_status = $order->status;
        $command->review = $request->review;
        $command->save();
        return redirect()->route('detail', $product_id)->with('success', 'Đánh giá của bạn đã được gửi.');
    }
}
