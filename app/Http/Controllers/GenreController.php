<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('genres.index', compact('genres'));
    }
    
    public function create()
    {
        return view('genres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:genres|max:255',
            'description' => 'nullable|string',
            'img_path' => 'nullable|array',
            'img_path.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $genre = new Genre();
        $genre->name = $request->name;
        $genre->description = $request->description;
    
        $imagePaths = [];
        if ($request->hasFile('img_path')) {
            foreach ($request->file('img_path') as $image) {
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $imagePaths[] = 'images/' . $imageName;
            }
        }
    
        $genre->img_path = implode(',', $imagePaths);
        $genre->save();
    
        return redirect()->route('genres.index')->with('success', 'Genre created successfully');
    }
    
    public function edit(Genre $genre)
    {
        return view('genres.edit', compact('genre'));
    }

    public function update(Request $request, Genre $genre)
    {
        $request->validate([
            'name' => 'required|unique:genres,name,' . $genre->id . '|max:255',
            'description' => 'nullable|string',
            'img_path' => 'nullable|array',
            'img_path.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $genre->name = $request->name;
        $genre->description = $request->description;

        $imagePaths = [];
        if ($request->hasFile('img_path')) {
            foreach ($request->file('img_path') as $image) {
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $imagePaths[] = 'images/' . $imageName;
            }
            $genre->img_path = implode(',', $imagePaths);
        }

        $genre->save();

        return redirect()->route('genres.index')->with('success', 'Genre updated successfully');
    }

    public function delete(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('genres.index')->with('success', 'Genre deleted successfully');
    }
}
