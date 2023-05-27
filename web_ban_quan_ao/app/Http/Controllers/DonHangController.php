<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DonHangController extends Controller
{
    public function order()
    {
        $orders=Order::orderBy('id','DESC')->paginate(10);
        $order_details=OrderDetail::all();
        return view('backend.order.index')->with('orders',$orders)
        ->with('order_details',$order_details);
    }

    
}
