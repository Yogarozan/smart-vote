
<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LandingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\VoterController;
use App\Http\Controllers\VotingController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\ProfileController;

// HALAMAN PUBLIK
Route::get('/', [LandingController::class, 'index'])->name('home');

Route::get('/tentang', [LandingController::class, 'tentang'])
    ->name('tentang');

Route::get('/keunggulan', [LandingController::class, 'keunggulan'])
    ->name('keunggulan');

Route::get('/panduan', [LandingController::class, 'panduan'])
    ->name('panduan');

// LOGIN
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

    // REGISTRASI PEMILIH
Route::get('register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'registerStepOne'])
    ->name('register.step1');

Route::get('/register/details', [AuthController::class, 'showRegisterDetails'])
    ->name('register.details');

Route::post('/register/details', [AuthController::class, 'registerStepTwo'])
    ->name('register.step2');

// LOGOUT
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// ADMIN
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

// PEMILIH
Route::middleware(['auth', 'role:voter'])
    ->prefix('voter')
    ->name('voter.')
    ->group(function () {

    // PROFIL USER
        Route::get('/profile', [ProfileController::class, 'show'])
            ->name('profile');

        Route::get('/profile/edit', [ProfileController::class, 'edit'])
            ->name('profile.edit');

        Route::put('/profile', [ProfileController::class, 'update'])
            ->name('profile.update');

        Route::get('/dashboard', [DashboardController::class, 'voter'])
            ->name('dashboard');

        Route::get('/vote/{election}', [VotingController::class, 'index'])
            ->name('vote');

        Route::post('/vote/{election}', [VotingController::class, 'store'])
            ->name('vote.store');

    });
