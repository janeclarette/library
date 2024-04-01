@extends('layouts.master')
@section('content')
    <div class="container">
        {!! $topSellingBooksChart->container() !!}
    </div>
    {!! $topSellingBooksChart->script() !!}
@endsection
