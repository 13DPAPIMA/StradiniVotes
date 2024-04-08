<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VoteController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/create-vote', [VoteController::class, 'create'])->name('votes.create')->middleware(['auth', AdminMiddleware::class]);

Route::get('/create-vote', [VoteController::class, 'create'])->name('votes.create')->middleware(['auth', AdminMiddleware::class]);
Route::post('/votes', [VoteController::class, 'store'])->name('votes.store');
Route::post('/votes/{id}', [VoteController::class, 'update'])->name('votes.update');


require __DIR__.'/auth.php';
