<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Create a new cart item
        $cartItem = new Cart();
        $cartItem->user_id = auth()->id(); // Assuming the user is authenticated
        $cartItem->book_id = $request->input('book_id');
        $cartItem->quantity = $request->input('quantity');
        $cartItem->save();

        // Optionally, you can return a response indicating success
        return response()->json(['message' => 'Item added to cart successfully']);
    }
}
