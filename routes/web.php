<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\Dashboard\ModerationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register.submit');

Route::middleware('auth')->group(function () {
    // Places
    Route::get('/places/create', [PlaceController::class, 'create'])->name('places.create');
    Route::post('/places', [PlaceController::class, 'store'])->name('places.store');
    Route::get('/places/{place}/edit', [PlaceController::class, 'edit'])->name('places.edit');
    Route::put('/places/{place}', [PlaceController::class, 'update'])->name('places.update');

    // Reviews
    Route::post('/places/{place}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
    Route::put('/reviews/{review}', [ReviewController::class, 'update'])->name('reviews.update');

    // Check-ins
    Route::post('/places/{place}/checkin', [CheckinController::class, 'store'])->name('checkins.store');
    Route::get('/my-checkins', [CheckinController::class, 'index'])->name('checkins.index');

    // Review Comments
    Route::post('/reviews/{review}/comments', [CommentController::class, 'store'])->name('review-comments.store');

    // Review Ratings (helpful/not helpful)
    Route::post('/reviews/{review}/rate', [RatingController::class, 'store'])->name('review-ratings.store');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/password', [ProfileController::class, 'updatePassword'])->name('password.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/places', [PlaceController::class, 'index'])->name('places.index');
Route::get('/places/{place}', [PlaceController::class, 'show'])->name('places.show');

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/moderation', [ModerationController::class, 'index'])->name('moderation.index');
    Route::post('/comments/{comment}/approve', [ModerationController::class, 'approveComment'])->name('comments.approve');
    Route::post('/comments/{comment}/reject', [ModerationController::class, 'rejectComment'])->name('comments.reject');
    Route::post('/places/{place}/approve', [ModerationController::class, 'approvePlace'])->name('places.approve');
    Route::post('/places/{place}/reject', [ModerationController::class, 'rejectPlace'])->name('places.reject');
});
