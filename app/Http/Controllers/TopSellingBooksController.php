<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\TopSellingBooksChart; // Assuming you have a chart class for top selling books
use App\Models\Book;
use DB;

class TopSellingBooksController extends Controller
{
    public function TopSellingBooks()
    {
        $topSellingBooks = Book::select('name', DB::raw('COUNT(carts.id) as orders_count'))
            ->leftJoin('carts', 'books.id', '=', 'carts.book_id')
            ->groupBy('books.id', 'books.name')
            ->orderByDesc('orders_count')
            ->limit(5)
            ->get();

        $topSellingBooksChart = new TopSellingBooksChart();
        $topSellingBooksChart->labels($topSellingBooks->pluck('name'));
        $topSellingBooksChart->dataset('Top Selling Books', 'bar', $topSellingBooks->pluck('orders_count'))
            ->backgroundColor('#7158e2')
            ->color('#3ae374');

            return view('top_selling_books', compact('topSellingBooksChart'));

    }
}
