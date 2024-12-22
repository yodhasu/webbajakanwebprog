@extends('main')

@section('title')
<title>Search Results for "{{ request('query') }}"</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
<div class="container">
    <h1>Search Results for "{{ request('query') }}"</h1>
    
    @if(count($results) > 0)
        <div class="movie-grid">
            @foreach ($results as $movie)
                <a href="{{ route('movie.show', ['id' => $movie['id']]) }}" class="movie-card">
                    <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}">
                    <h3>{{ $movie['title'] }}</h3>
                    <p>{{ $movie['release_date'] }}</p>
                </a>
            @endforeach
        </div>
    @else
        <p>No results found for "{{ request('query') }}". Please try another search.</p>
    @endif
</div>
@endsection
