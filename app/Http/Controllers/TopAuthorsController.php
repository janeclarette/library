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

        $topAuthorsData = Author::select('authors.name', DB::raw('COUNT(books.id) as book_count')) // Specify table alias for the name column
            ->leftJoin('books', 'authors.id', '=', 'books.author_id')
            ->groupBy('authors.id', 'authors.name')
            ->orderByDesc('book_count')
            ->limit(5)
            ->get();

        $topAuthorsChart = new TopAuthors();

        $topAuthorsChart->labels($topAuthorsData->pluck('name'));
        $topAuthorsChart->dataset('', 'pie', $topAuthorsData->pluck('book_count'))
            ->backgroundColor(['#ff9999', '#66b3ff', '#99ff99', '#ffcc99', '#c2c2f0']);

        return view('top_authors', compact('topAuthorsChart'));
    }
}
