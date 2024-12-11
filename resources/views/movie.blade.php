@extends('main')

@section('title')
<title>Dart - {{ $movie['title'] }}</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/movie.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
<div class="movie-details">
    <!-- Upper Section -->
    <div class="movie-header">
        <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}" class="movie-poster">
        <div class="movie-info">
            <h1>{{ $movie['title'] }}</h1>
            <p class="rating">{{ $movie['vote_average'] }} / 10</p>
            <p class="genres">Genres: 
                @foreach ($movie['genres'] as $genre)
                    {{ $genre['name'] }}{{ !$loop->last ? ', ' : '' }}
                @endforeach
            </p>
            <p class="release-date"><strong>Release Date:</strong> {{ $movie['release_date'] }}</p>
            
            <h2 class="synopsis">Synopsis</h2>
            <p>{{ $movie['overview'] }}</p>
            
    </div>
            
</div>

        <!-- Overview Section -->
    

        <!-- Movie Player Section -->
    <div class="movie-player">
        <h2>Watch Movie</h2>
        <iframe 
            src="https://vidsrc.icu/embed/movie/{{ $movie['id'] }}" 
            width="100%" 
            height="500" 
            frameborder="0" 
            allowfullscreen>
        </iframe>
    </div>

@endsection
