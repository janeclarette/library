<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderReview;
use Illuminate\Support\Facades\Redirect;

class ReviewController extends Controller
{

    public function create($orderId)
    {
        return view('review.create', ['orderId' => $orderId]);
    }
    


    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:255',
        ]);
    
        // Create a new review instance
        $review = new OrderReview(); // Use the correct Review model
        $review->order_id = $validatedData['order_id'];
        $review->user_id = auth()->user()->id; // Assuming the user is authenticated
        $review->rating = $validatedData['rating'];
        $review->comment = $validatedData['comment'];
    
        // Save the review
        $review->save();
    
        // Optionally, you might want to redirect the user back with a success message
        return Redirect::route('order.dashboard')->with('success', 'Review submitted successfully.');
    }
    
}
