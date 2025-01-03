@extends('main')

@section('title')
<title>Search Results for "{{ request('query') }}"</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ secure_asset('css/comingsoon.css') }}">
<link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
@endsection
 
@section('content')
<div class="cont">
    <h1>Comming Soon!</h1>
</div>
@endsection
