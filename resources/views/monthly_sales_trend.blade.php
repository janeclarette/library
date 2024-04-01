
@include('../admin/dashboard')
@extends('layouts.master')

@section('content')
    <h2>Monthly Sales Chart </h2>
    <div class="chart-container">
        {!! $monthlySalesChart->container() !!}
    </div>
    {!! $monthlySalesChart->script() !!}

    <style>
       
        .chart-container {
            margin-top: 80px;
            margin-left: 250px;
            width: 100%;
            max-width: 800px; 
            padding: 20px; 
            background-color: #EEE9DA;
            border-radius: 10px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
        }
    </style>
@endsection

