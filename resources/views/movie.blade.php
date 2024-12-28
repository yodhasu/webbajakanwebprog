@extends('main')

@section('title')
<title>Dart - {{ $movie['title'] }}</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ secure_asset('css/movie.css') }}">
<link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
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


    <div class="comments-section">
        <h3>Comments</h3>
        @foreach ($comments as $comment)
            <div class="comment">
                <p><strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}</p>
                <p><small>Posted on {{ $comment->created_at->diffForHumans() }}</small></p>
            </div>
        @endforeach

        @auth
        <<form action="{{ route('movie.addComment', $movie['id']) }}" method="POST">
            @csrf  <!-- CSRF Token for security -->
            
            <div class="form-group">
                <label for="content">Your Comment:</label>
                <textarea id="content" name="content" rows="4" class="form-control" required></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary mt-2">Submit Comment</button>
        </form>
        @else
        <p>Please <a href="{{ route('login') }}">login</a> to add a comment.</p>
        @endauth

    </div>
</div>
@endsection
