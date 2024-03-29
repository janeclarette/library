<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Cart;


class CartController extends Controller

{   


    public function index()
    {

        $cartItems = Cart::where('user_id', auth()->id())->get();
        return view('cart', compact('cartItems'));
    }

    public function add(Request $request, Book $book)
    {
        $cart = Cart::where('user_id', auth()->id())
                    ->where('book_id', $book->id)
                    ->first();
    
        if ($cart) {
            $cart->quantity++;
            $cart->save();
        } else {
            Cart::create([
                'user_id' => auth()->id(),
                'book_id' => $book->id,
                'quantity' => 1,
            ]);
        }
    
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
}
