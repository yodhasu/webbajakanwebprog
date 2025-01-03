<?php

// Updated web.php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SearchController;

Route::get('/', function(){
    return redirect('/dashboard');
});

// Add the verification.notice route
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

// Verification routes for email
Route::get('/email/verify/{id}/{hash}', function (Request $request, $id, $hash) {
    // dump($request->all());
    $user = $request->user();

    if ($user->hasVerifiedEmail()) {
        return redirect()->route('dashboard');
    }

    if ($user->markEmailAsVerified()) {
        event(new \Illuminate\Auth\Events\Verified($user));
    }

    return redirect()->route('dashboard')->with('verified', true);
})->middleware(['auth', 'signed'])->name('verification.verify');

// Resend verification email
Route::post('/email/resend', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

// Authentication routes
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Password reset routes
Route::get('/password/reset', [AuthController::class, 'showPasswordRequestForm'])->name('password.request');
Route::post('/password/email', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [AuthController::class, 'resetPassword'])->name('password.update');

// Public route - anyone can access, even if not logged in
Route::get('/dashboard', function () {
    return (new MovieController)->home();
})->name('dashboard');

// Movie details route
Route::get('/movie/{id}', function ($id) {
    return (new MovieController)->show($id);
})->name('movie.show');

Route::get('/search', [SearchController::class, 'search']);

Route::post('/movie/{id}/comment', [MovieController::class, 'addComment'])->name('movie.addComment');

// coming soon
Route::get('/coming_soon', function(){
    return view("comming_soon");
})->name('comingsoon');
