<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\MonthlySalesTrendChart;
use DB;

class MonthlySalesTrendController extends Controller
{
    public function monthlySalesTrend()
    {
        $monthlySalesData = DB::table('orders')
            ->join('books', 'orders.book_id', '=', 'books.id')
            ->select(
                DB::raw("DATE_FORMAT(orders.date_ordered, '%Y-%m') AS month_year"),
                DB::raw("SUM(books.price) AS total_revenue")
            )
            ->groupBy('month_year')
            ->orderBy('month_year')
            ->get();
    
        $monthlySalesChart = new MonthlySalesTrendChart();
        $monthlySalesChart->labels($monthlySalesData->pluck('month_year'));
        $monthlySalesChart->dataset('Monthly Sales Trend', 'line', $monthlySalesData->pluck('total_revenue'))
            ->backgroundColor('#7158e2')
            ->color('#3ae374');
    
        return view('monthly_sales_trend', compact('monthlySalesChart'));
    }
    
}
