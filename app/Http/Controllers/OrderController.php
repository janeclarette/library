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
        // Fetch distinct orders for the authenticated user with book details using Eloquent
        $orders = Order::with('book')
                        ->where('user_id', auth()->user()->id)
                        ->get();
    
        // Render the order dashboard view with the fetched orders
        return view('order.order_dashboard', compact('orders'));
    }
    
    public function reviewOrder(Request $request, $orderId)
{
    // Validate the request if necessary

    // Find the order
    $order = Order::findOrFail($orderId);

    // Perform additional checks if necessary, such as ensuring the order belongs to the authenticated user

    // Update the order status to "reviewed" or any other appropriate status
    $order->update(['status' => 'reviewed']);

    // Optionally, redirect the user back to the dashboard or to a thank you page
    return redirect()->route('order.dashboard')->with('success', 'Order reviewed successfully.');
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
