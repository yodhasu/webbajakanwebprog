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
    // Debugging information
    dump('Email verification process started', [
        'user_id' => $id,
        'hash' => $hash,
        'request_hash' => sha1($request->user()->getEmailForVerification())
    ]);
    
    $user = \App\Models\User::findOrFail($id);

    if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
        dump('Hash does not match', [
            'provided_hash' => $hash,
            'expected_hash' => sha1($user->getEmailForVerification())
        ]);
        return abort(403);
    }

    if ($user->hasVerifiedEmail()) {
        dump('User already verified', ['user_id' => $id]);
        return redirect()->route('dashboard');
    }

    if ($user->markEmailAsVerified()) {
        event(new \Illuminate\Auth\Events\Verified($user));
        dump('User email verified', ['user_id' => $id]);
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
