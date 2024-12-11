<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function home()
    {
        $apiKey = env('TMDB_API_KEY');
        $baseUrl = 'https://api.themoviedb.org/3';

        // Fetch data from TMDB API
        $inTheaters = Http::get("$baseUrl/movie/now_playing?api_key=$apiKey&language=en-US&page=1")->json();
        $trending = Http::get("$baseUrl/trending/movie/week?api_key=$apiKey")->json();
        $topRated = Http::get("$baseUrl/movie/top_rated?api_key=$apiKey&language=en-US&page=1")->json();

        return view('home', [
            'inTheaters' => $inTheaters['results'],
            'trending' => $trending['results'],
            'topRated' => $topRated['results'],
        ]);
    }

    public function show($id)
    {
        $apiKey = env('TMDB_API_KEY');
        $baseUrl = 'https://api.themoviedb.org/3';

        // Fetch movie details
        $movieDetails = Http::get("$baseUrl/movie/$id?api_key=$apiKey&language=en-US")->json();

        return view('movie', [
            'movie' => $movieDetails,
        ]);
    }

}
