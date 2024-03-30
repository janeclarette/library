<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;

class CheckoutController extends Controller
{
    public function showDashboard()
    {
        // Retrieve selected item IDs from the session or any other storage mechanism
        $selectedItems = session('selected_items', []);

        // Fetch the selected items from the database
        $cartItems = Cart::whereIn('id', $selectedItems)->get();

        return view('checkout.dashboard', compact('cartItems'));
    }
}

