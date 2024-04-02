<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\Supplier;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderReceipt;
use Illuminate\Support\Facades\Storage;


class CheckoutController extends Controller
{
public function showDashboard()
{
    $selectedItems = session('selected_items', []);
    $cartItems = Cart::whereIn('id', $selectedItems)->get();
    
    
    $book = $cartItems->isNotEmpty() ? $cartItems->first()->book : null;


    $userAddress = auth()->user()->address;

    return view('checkout.dashboard', compact('cartItems', 'book', 'userAddress'));
}

    

    public function placeOrder(Request $request)
    {
        // Retrieve selected item IDs from the session or any other storage mechanism
        $selectedItems = session('selected_items', []);

        // Fetch the selected items from the database
        $cartItems = Cart::whereIn('id', $selectedItems)->get();

        // Store order details
        $order = new Order();
        $order->user_id = auth()->id();
        $order->book_id = $request->input('book_id'); 
        $order->date_ordered = now();
        $order->courier = $request->input('courier');
        $order->status = 'Pending';
        $order->payment_method = $request->input('payment_method');
        $order->shipping_fee = 0;
        $order->save();
        


        foreach ($cartItems as $item) {
            $supplier = Supplier::where('book_id', $item->book_id)->first();
            if ($supplier) {
                $supplier->quantity -= $item->quantity;
                $supplier->save();
            }
        }

        // Mark selected items as processed
        Cart::whereIn('id', $selectedItems)->update(['processed' => true]);

        // Clear selected items from the session
        $request->session()->forget('selected_items');

        // Redirect or return a response as needed
        return redirect()->route('checkout.dashboard')->with('success', 'Order placed successfully.');
    }
    
    

}

