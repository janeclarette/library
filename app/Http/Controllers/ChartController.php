<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Order;
use DB;

class ChartController extends Controller
{
    public function topSellingBooks()
    {
        $topSellingBooks = Book::select('books.name', DB::raw('COUNT(carts.id) as orders_count'))
            ->leftJoin('carts', 'books.id', '=', 'carts.book_id')
            ->groupBy('books.id', 'books.name') // Include books.name in the GROUP BY clause
            ->orderByDesc('orders_count')
            ->limit(10)
            ->get();
    
        return response()->json($topSellingBooks);
    }

    public function revenueByGenre()
    {
        $revenueByGenre = Genre::withSum('books', 'price')->get();
        return response()->json($revenueByGenre);
    }

    public function monthlySalesTrend()
    {
        $monthlySalesTrend = DB::table('carts')
            ->join('books', 'carts.book_id', '=', 'books.id')
            
            ->select(DB::raw("DATE_FORMAT(carts.created_at, '%Y-%m') AS month_year"), DB::raw("SUM(carts.quantity * books.price) AS total_revenue"))
            ->groupBy('month_year')
            ->orderBy('month_year')
            ->get();
    
        return response()->json($monthlySalesTrend);
    }
    
    
    
}
