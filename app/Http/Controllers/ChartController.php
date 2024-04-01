<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Order;
use App\Charts\TopSellingBooksChart;
use DB;

class ChartController extends Controller
{
    public function TopSellingBooks()
    {
        $topSellingBooks = Book::select('name', DB::raw('COUNT(carts.id) as orders_count'))
            ->leftJoin('carts', 'books.id', '=', 'carts.book_id')
            ->groupBy('books.id', 'books.name')
            ->orderByDesc('orders_count')
            ->limit(5)
            ->get();
    
        $topSellingBooksData = [
            'labels' => $topSellingBooks->pluck('name'),
            'datasets' => [
                [
                    'label' => 'Top Selling Books',
                    'backgroundColor' => '#7158e2',
                    'data' => $topSellingBooks->pluck('orders_count')
                ]
            ]
        ];
    
        return response()->json($topSellingBooksData);
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
