<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    public function search(Request $request) 
    {
        $query = $request->input('query');
        $type = $request->input('type');
    
        if ($type === 'movie') {
            // Fetch the movie details from TMDB
            $response = Http::get("https://api.themoviedb.org/3/search/movie", [
                'api_key' => 'f7a02d75c1d75b0a707ecd3277e64257',
                'query' => $query,
            ]);
    
            $results = $response->json()['results'];
    
            // Redirect to movie page if exactly one result is found
            if (count($results) === 1) {
                $movieId = $results[0]['id'];
                $movieDetails = Http::get("https://api.themoviedb.org/3/movie/$movieId", [
                    'api_key' => 'f7a02d75c1d75b0a707ecd3277e64257',
                    'language' => 'en-US',
                ])->json();
    
                return view('movie', ['movie' => $movieDetails]);
            }
    
            // If multiple results or none, return to search results
            return view('search-results', ['results' => $results, 'type' => 'movie']);
        } else if ($type === 'anime') {
            // Example anime API
            $results = Http::get("https://vidsrc-api-url/search", [
                'query' => $query,
            ])->json();
    
            return view('search-results', ['results' => $results, 'type' => 'anime']);
        }
    }    
}
