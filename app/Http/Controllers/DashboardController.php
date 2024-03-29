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
        $books = Book::all();
    }


    return view('dashboard', compact('books'));
}  

public function index()
{
    $books = Book::with('author', 'genre', 'suppliers')->get();
    return view('dashboard', compact('books'));
}

}
