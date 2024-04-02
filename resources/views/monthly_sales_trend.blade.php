
@include('../admin/dashboard')
@extends('layouts.master')

<style>
    .chart-container {
    /* Add styles to the chart container */
    background: #EEE9DA;
    width: 100%; /* Example width */
    max-width: 800p
    x; /* Example max-width */
    margin-top: 80px;
    margin-left: 90px; /* Center horizontally */
    padding: 20px; /* Example padding */
    border-radius: 10px; /* Example border-radius */
}
        h2{
            margin-left: 460px;
            margin-top: 70px;
        }

    </style>

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

