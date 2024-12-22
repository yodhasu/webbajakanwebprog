<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request; // Correct Request import
use App\Models\Comment; // Ensure the Comment model is imported
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

        $movieDetails = Http::get("$baseUrl/movie/$id?api_key=$apiKey&language=en-US")->json();

        $comments = Comment::where('movie_id', $id)->with('user')->latest()->get();

        return view('movie', [
            'movie' => $movieDetails,
            'comments' => $comments,
        ]);
    }

    public function addComment(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        // Create a new comment
        Comment::create([
            'movie_id' => $id, // The movie ID from the API
            'user_id' => auth()->id(), // The authenticated user's ID
            'content' => $request->input('content'),
        ]);

        // Redirect back to the movie page
        return redirect()->route('movie.show', ['id' => $id])
                         ->with('success', 'Comment added successfully!');
    }

    public function __construct()
    {
        $this->middleware('auth');  // Ensure user is authenticated
    }

}
