
@include('../admin/dashboard')

@extends('layouts.master')
@section('content')
    <div class="container">
        <h2>Top Selling Books Chart</h2>
        <div class="chart-container" style="position: relative; height: 300px; width: 100%;">
            {!! $topSellingBooksChart->container() !!}
        </div>
    </div>
    {!! $topSellingBooksChart->script() !!}

    <style>
       
        .chart-container {
            margin-left: 95px;
            margin-top: 45px; 
            background: #EEE9DA;
        }
        h2{
            margin-left: 460px;
            margin-top: 50px;
        }
    </style>
@endsection
