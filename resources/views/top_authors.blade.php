
@include('../admin/dashboard')
@extends('layouts.master')
<style>
    .chart-container {
   
    background: #EEE9DA;
    width: 100%;
    max-width: 800p
    x; 
    margin-top: 80px;
    margin-left: 90px; 
    padding: 20px; 
    border-radius: 10px; 
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
