<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class CartController extends Controller

{   


    public function index()
    {
        $cartItems = Cart::where('user_id', auth()->id())
                        ->where('processed', false) // Filter out processed items
                        ->get();
        return view('cart', compact('cartItems'));
    }


    public function add(Request $request, Book $book)
    {
        // Check if the book is already in the cart
        $cart = Cart::where('user_id', auth()->id())
                    ->where('book_id', $book->id)
                    ->where('processed', false)
                    ->first();

        if ($cart) {
            // If the book is in the cart, increment the quantity
            $cart->quantity++;
            $cart->save();
        } else {
            // If the book is not in the cart, create a new cart item
            Cart::create([
                'user_id' => auth()->id(),
                'book_id' => $book->id,
                'quantity' => 1,
                'processed' => false,
            ]);
        }

        // Redirect back to the cart page
        return redirect()->back()->with('success', 'Book added to cart successfully.');
    }
    public function reduceByOne($id)
    {
        $cartItem = Cart::findOrFail($id);

        if ($cartItem->quantity > 1) {
            $cartItem->quantity--;
            $cartItem->save();
        } else {
            $cartItem->delete();
        }

        return redirect()->route('cart')->with('success', 'Item quantity reduced by one.');
    }

            public function removeItem($id)
            {
                Cart::findOrFail($id)->delete();

                return redirect()->route('cart')->with('success', 'Item removed from cart.');
            }
            public function addToCart($id)
        {
            $cartItem = Cart::findOrFail($id);
            $cartItem->quantity++;
            $cartItem->save();

            return redirect()->route('cart')->with('success', 'Item quantity increased by one.');
        }


        public function checkout(Request $request)
        {
            $selectedItems = $request->input('selected_items', []);
    
            // Mark selected items as processed
            Cart::whereIn('id', $selectedItems)->update(['processed' => true]);
    
            // Store the selected item IDs in the session
            $request->session()->put('selected_items', $selectedItems);
    
            return redirect()->route('checkout.dashboard');
        }

}