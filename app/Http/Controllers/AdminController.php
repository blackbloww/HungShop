<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $contact = Contact::all();
        $orders = Order::all();
        $product = Product::all();
        $users = User::all();
            $todayOrders = Order::whereDate('created_at', Carbon::today())->get();
            $todayOrderCount = $todayOrders->count();
            $sales = Order::select(
                DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as day'),
                DB::raw('SUM(total_price) as total_sales'),
                DB::raw('SUM(CASE WHEN status = "hoàn thành" THEN total_price ELSE 0 END) as completed_sales'),
                DB::raw('COUNT(*) as order_count')
            )
            ->groupBy('day')
            ->get();
        $unseenCount = $contact->where('status', 'Chưa xem')->count();
        return view('admin.index', compact('users','orders','product','todayOrderCount','sales','unseenCount'));
    }

    
}
