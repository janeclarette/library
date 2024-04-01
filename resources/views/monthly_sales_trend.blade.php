@extends('layouts.master')

@section('content')
    <div class="container">
        {!! $monthlySalesChart->container() !!}
    </div>
    {!! $monthlySalesChart->script() !!}
@endsection
