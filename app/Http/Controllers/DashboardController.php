<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class DashboardController extends Controller
{
    public function show(Request $request)
    {
        // If search query is present, perform search
        if ($request->has('search')) {
            $search = $request->input('search');
            $books = Book::where('name', 'LIKE', "%$search%")
                        ->orWhere('description', 'LIKE', "%$search%")
                        ->get();
        } else {
            // If no search query, simply retrieve all books
            $books = Book::with('author', 'genre', 'suppliers')
                         ->withAvg('reviews', 'rating') // Calculate average rating for each book
                         ->get();
        }

        return view('dashboard', compact('books'));
    }  

    public function index()
    {
        // Retrieve all books with their associated data and average rating
        $books = Book::with('author', 'genre', 'suppliers')
                     ->withAvg('reviews', 'rating')
                     ->get();
    
        return view('dashboard', compact('books'));
    }

public function view($id)
{
    // Debugging statement to check book ID
    //dd($id);

    $book = Book::findOrFail($id);
    return view('users.viewproduct', compact('book'));
}


}


