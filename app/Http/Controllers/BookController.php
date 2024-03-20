<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }
    

    public function create()
    {
        $authors = Author::all();
        $genres = Genre::all(); // Fetch all genres
        return view('books.create', ['authors' => $authors, 'genres' => $genres]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'img_path.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author_id' => 'required|exists:authors,id',
            'genre_id' => 'required|exists:genres,id', // Add this line for genre_id validation
        ]);
        
    
        

        // Handling multiple image upload
        $imagePaths = [];
        if ($request->hasFile('img_path')) {
            foreach ($request->file('img_path') as $image) {
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $imagePaths[] = 'images/' . $imageName;
            }
        }

        $data['img_path'] = implode(',', $imagePaths);

        $newBook = Book::create($data);

        return redirect(route('books.index'))->with('success', 'Book created successfully');
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        $genres = Genre::all(); // Fetch all genres
        return view('books.edit', ['book' => $book, 'authors' => $authors, 'genres' => $genres]);
    }

    
    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'img_path.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author_id' => 'required|exists:authors,id',
            'genre_id' => 'required|exists:genres,id'
        ]);
    
        // Handling multiple image upload
        $imagePaths = [];
        if ($request->hasFile('img_path')) {
            foreach ($request->file('img_path') as $image) {
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $imagePaths[] = 'images/' . $imageName;
            }
        }
    
        $data['img_path'] = implode(',', $imagePaths);
    
        // Update the book record with the validated data
        $book->update($data);
    
        return redirect(route('books.index'))->with('success', 'Book updated successfully');
    }
    

    public function delete(Book $book)
    {
        $book->delete();
        return redirect(route('books.index'))->with('success', 'Book deleted successfully');
    }
    


}
