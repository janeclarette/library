@extends('layouts.master')

@section('content')
    <div class="container">
        {!! $topAuthorsChart->container() !!}
    </div>
    {!! $topAuthorsChart->script() !!}
@endsection
