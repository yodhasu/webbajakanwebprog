@extends('main')

@section('title')
<title>Dart - Home</title>
@endsection

@section('css')
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/home.css">
@endsection

@section('js')
<script src="js/scroll.js"></script>
@endsection


@section('content')
<section class="hero">
    <div class="container">
      <div class="hero-content">
        <p class="hero-subtitle">Dart</p>
          <h1 class="h1 hero-title">
            Your One Stop <strong>Movie</strong> Streaming Service
          </h1>
          <div class="meta-wrapper">
            <button class="btn btn-primary">
              <a><span>Find me a movie</span></a>
            </button>
          </div>
        </div>
    </div>
</section>

<div class="info">
    <h1>In Theaters</h1>
    <div class="carousel">
        <button class="arrow left-arrow" onclick="scrollLeft('recentReleases')">&lt;</button>
        <div id="recentReleases" class="trending-movies">
            @foreach ($inTheaters as $movie)
                <a href="{{ route('movie.show', ['id' => $movie['id']]) }}">
                    <div class="trending-movie">
                        <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}" class="trending-movie-poster">
                        <h3 class="trending-movie-title">{{ $movie['title'] }}</h3>
                    </div>
                </a>
            @endforeach
        </div>
        <button class="arrow right-arrow" onclick="scrollRight('recentReleases')">&gt;</button>
    </div>
    <h1>Trending Now</h1>
    <div class="carousel">
        <button class="arrow left-arrow" onclick="scrollLeft('recentReleases')">&lt;</button>
        <div id="trendingMovies" class="trending-movies">
            @foreach ($trending as $movie)
                <a href="{{ route('movie.show', ['id' => $movie['id']]) }}">
                    <div class="trending-movie">
                        <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}" class="trending-movie-poster">
                        <h3 class="trending-movie-title">{{ $movie['title'] }}</h3>
                    </div>
                </a>
            @endforeach
        </div>
        <button class="arrow right-arrow" onclick="scrollRight('recentReleases')">&gt;</button>
    </div>
    <h1>Top Movies</h1>
    <div class="carousel">
        <button class="arrow left-arrow" onclick="scrollLeft('recentReleases')">&lt;</button>
        <div id="topRatedMovies" class="trending-movies">
            @foreach ($topRated as $movie)
                <a href="{{ route('movie.show', ['id' => $movie['id']]) }}">
                    <div class="trending-movie">
                        <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}" class="trending-movie-poster">
                        <h3 class="trending-movie-title">{{ $movie['title'] }}</h3>
                    </div>
                </a>    
            @endforeach
        </div>
        <button class="arrow right-arrow" onclick="scrollRight('recentReleases')">&gt;</button>
    </div>
    <div class="bottom"></div>
</div>

@endsection