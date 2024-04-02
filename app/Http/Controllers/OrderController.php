<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
   
    public function dashboard()
    {

        $orders = Order::with('book')
                        ->where('user_id', auth()->user()->id)
                        ->get();
    
        return view('order.order_dashboard', compact('orders'));
    }
    

    

    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    public function edit(Order $order)
    {
        return view('admin.orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $order->update($request->all());
        return redirect()->route('admin.orders.index')->with('success', 'Order status updated successfully.');
    }
}
