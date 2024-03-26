<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class DashboardController extends Controller
{
    public function show()
    {
        $books = Book::all(); // Retrieve all books from the database
        return view('dashboard', compact('books'));
    }
}
