<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\TopAuthors; // Import the chart class
use App\Models\Author;
use DB;

class TopAuthorsController extends Controller
{
    public function topAuthors()
    {
        // Fetch top authors data
        $topAuthorsData = Author::select('authors.name', DB::raw('COUNT(books.id) as book_count')) // Specify table alias for the name column
            ->leftJoin('books', 'authors.id', '=', 'books.author_id')
            ->groupBy('authors.id', 'authors.name')
            ->orderByDesc('book_count')
            ->limit(5)
            ->get();

        // Create a new instance of the chart
        $topAuthorsChart = new TopAuthors();
        // Set labels and dataset
        $topAuthorsChart->labels($topAuthorsData->pluck('name'));
        $topAuthorsChart->dataset('', 'pie', $topAuthorsData->pluck('book_count'))
            ->backgroundColor(['#ff9999', '#66b3ff', '#99ff99', '#ffcc99', '#c2c2f0']);

        // Pass the chart data to the view
        return view('top_authors', compact('topAuthorsChart'));
    }
}
