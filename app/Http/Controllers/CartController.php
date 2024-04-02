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
                        ->where('processed', false) 
                        ->get();
        return view('cart', compact('cartItems'));
    }


    public function add(Request $request, Book $book)
    {

        $cart = Cart::where('user_id', auth()->id())
                    ->where('book_id', $book->id)
                    ->where('processed', false)
                    ->first();

        if ($cart) {

            $cart->quantity++;
            $cart->save();
        } else {

            Cart::create([
                'user_id' => auth()->id(),
                'book_id' => $book->id,
                'quantity' => 1,
                'processed' => false,
            ]);
        }


        return redirect()->back()->with('success', 'Book added to cart successfully.');
    }

    public function increment(Cart $item)
    {

        if ($item->user_id !== auth()->id()) {
            abort(403);
        }
    

        $item->quantity++;
        $item->save();
    
        return redirect()->back()->with('success', 'Quantity incremented successfully');
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
    

            Cart::whereIn('id', $selectedItems)->update(['processed' => true]);
    

            $request->session()->put('selected_items', $selectedItems);
    
            return redirect()->route('checkout.dashboard');
        }

}