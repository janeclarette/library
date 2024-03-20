<?php

namespace App\Http\Controllers;
use App\Models\Author;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();

        // Return the view with the authors data
        return view('authors.index', compact('authors'));
    }
    

    public function create()
    {
        return view('authors.create');
        
    }
    public function store(Request $request)
    {
        $author = new Author();
        $author->name = $request->input('name');
        $author->date_of_birth = $request->input('date_of_birth');
    
        // Handling multiple image uploads
        if ($request->hasFile('img_path')) {
            $imagePaths = [];
            foreach ($request->file('img_path') as $image) {
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $imagePaths[] = 'images/' . $imageName;
            }
            // Convert the array of image paths to a comma-separated string and store it in the database
            $author->img_path = implode(',', $imagePaths);
        }
    
        $author->save();
    
        return redirect()->route('authors.index');
    }
    
    public function edit($id)
    {
        $author = Author::find($id);
        return view('authors.edit', compact('author'));
    }
    
    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);
        $author->name = $request->name;
        $author->date_of_birth = $request->date_of_birth;
    
        // Handle multiple image uploads
        if ($request->hasFile('img_path')) {
            $imagePaths = [];
            foreach ($request->file('img_path') as $image) {
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $imagePaths[] = 'images/' . $imageName;
            }
            $author->img_path = implode(',', $imagePaths);
        }
    
        $author->save();
        return redirect()->route('authors.index');
    }
    
    public function delete($id)
    {
        Author::destroy($id);
        return Redirect::to('author');
    }
}
