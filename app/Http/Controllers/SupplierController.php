<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Book; 


class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::with('book')->get();
        return view('suppliers.index', compact('suppliers'));
    }
    
    public function create()
    {
        $books = Book::all();
        return view('suppliers.create', compact('books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:suppliers|max:255',
            'transactiondate' => 'required|date',
            'quantity' => 'required|numeric',
            'img_path' => 'nullable|array',
            'img_path.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'book_id' => 'required|exists:books,id',
        ]);

        $supplier = new Supplier();
        $supplier->book_id = $request->book_id;
        $supplier->name = $request->name;
        // Handle image upload if provided
        if ($request->hasFile('img_path')) {
            $imagePaths = [];
            foreach ($request->file('img_path') as $image) {
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $imagePaths[] = 'images/' . $imageName;
            }
            $supplier->img_path = implode(',', $imagePaths);
        }
        
        $supplier->transactiondate = $request->transactiondate;
        $supplier->quantity = $request->quantity;
        $supplier->save();

        return redirect()->route('suppliers.index')->with('success', 'Supplier created successfully');
    }

    public function edit(Supplier $supplier)
    {
        $books = Book::all();
        return view('suppliers.edit', compact('supplier', 'books'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'name' => 'required',
            'transactiondate' => 'required|date',
            'quantity' => 'required|numeric',
            'img_path' => 'nullable|array',
            'img_path.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $supplier->book_id = $request->book_id;
        $supplier->name = $request->name;
        $supplier->transactiondate = $request->transactiondate;
        $supplier->quantity = $request->quantity;
    

        if ($request->hasFile('img_path')) {
            $imagePaths = [];
            foreach ($request->file('img_path') as $image) {
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $imagePaths[] = 'images/' . $imageName;
            }
            $supplier->img_path = implode(',', $imagePaths);
        }
    
        $supplier->save();
    
        return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully');
    }
    

    public function delete(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully');
    }
}
