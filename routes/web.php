<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\MovieController;

Route::get('/', function(){
    return redirect('/dashboard');
});

// Add the verification.notice route
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

// Verification routes for email
Route::get('/email/verify/{id}/{hash}', function (Request $request, $id, $hash) {
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

// Public route - anyone can access, even if not logged in
Route::get('/dashboard', function () {
    return (new MovieController)->home();
})->name('dashboard');

// Movie details route
// nigger
// yodhasu commit
Route::get('/movie/{id}', function ($id) {
    return (new MovieController)->show($id);
})->name('movie.show');
