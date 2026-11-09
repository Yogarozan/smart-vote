<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\VoterController;
use App\Http\Controllers\VotingController;
use App\Http\Controllers\ResultController;

// Halaman login
Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.process');
});

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Admin
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'admin'])
            ->name('dashboard');

        Route::resource('candidates', CandidateController::class);

        Route::resource('elections', ElectionController::class);

        Route::resource('voters', VoterController::class);

        Route::get('/results', [ResultController::class, 'index'])
            ->name('results');
    });

// Pemilih
Route::middleware(['auth', 'role:voter'])
    ->prefix('voter')
    ->name('voter.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'voter'])
            ->name('dashboard');

        Route::get('/vote/{election}', [VotingController::class, 'index'])
            ->name('vote');

        Route::post('/vote/{election}', [VotingController::class, 'store'])
            ->name('vote.store');
    });
