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
    </style>
@section('content')
    <div class="flex justify-center items-center h-full">
        <div class="chart-container bg-EEE9DA">
            <div class="inner-container bg-967E76 p-4 rounded-lg">
                <div class="container">
                    {!! $topAuthorsChart->container() !!}
                </div>
            </div>
        </div>
    </div>
    {!! $topAuthorsChart->script() !!}
@endsection
