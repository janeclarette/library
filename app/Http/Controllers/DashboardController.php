<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\OrderReview;

class DashboardController extends Controller
{
    public function show(Request $request)
    {
        
        if ($request->has('search')) {
            $search = $request->input('search');
            $books = Book::where('name', 'LIKE', "%$search%")
                        ->orWhere('description', 'LIKE', "%$search%")
                        ->get();
        } else {
           
            $books = Book::with('author', 'genre', 'suppliers')
                         ->withAvg('reviews', 'rating') 
                         ->get();
        }

        return view('dashboard', compact('books'));
    }  

    public function index()
    {

        $books = Book::with('author', 'genre', 'suppliers')
                     ->withAvg('reviews', 'rating')
                     ->get();
    
        return view('dashboard', compact('books'));
    }

    public function view($id)
    {

        $book = Book::findOrFail($id);
    

        $orderReview = OrderReview::whereHas('order', function($query) use ($id) {
            $query->where('book_id', $id);
        })->first();
    
        return view('users.viewproduct', compact('book', 'orderReview'));
    }

}


