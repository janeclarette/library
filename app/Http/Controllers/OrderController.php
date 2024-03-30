<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
   /*  public function checkout(Request $request)
    {
        // Logic to handle checkout process and store order details
        $order = Order::create([
            'user_id' => auth()->id(),
            'date_ordered' => now(),
            'courier' => $request->input('courier'),
            'status' => 'Pending', // Initial status
            'shipping_fee' => $request->input('shipping_fee'),
            'payment_method' => $request->input('payment_method'),
            'received' => 0, // Default to not received
            'cancellation_reason' => null, // Initially no cancellation reason
        ]); */

        // Additional logic for storing order items, if needed

        // Redirect or return response as needed
    /* } */
}
