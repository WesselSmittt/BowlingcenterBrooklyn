<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReserverenController;
use App\Http\Controllers\MedewerkersController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ScoresController;
use App\Http\Controllers\DashboardController;
use App\Models\Medewerkers;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/reserveren', [ReserverenController::class, 'index'])->name('reserveren.index');
    Route::post('/reserveren', [ReserverenController::class, 'store'])->name('reserveren.store');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/medewerkers', [MedewerkersController::class, 'index'])->name('medewerkers.index');
    Route::get('/mederwerkers/user/{id}', [MedewerkersController::class, 'userReservations'])->name('allreservations.user');
    Route::get('reservation/edit/{id}', [MedewerkersController::class, 'edit'])->name('reservation.edit');
    Route::put('medewerkers/{id}', [MedewerkersController::class, 'update'])->name('medewerkers.update');
    Route::delete('/reservation/{id}', [MedewerkersController::class, 'destroy'])->name('reservation.destroy');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/scores', [ScoresController::class, 'index'])->name('scores.index');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/reserveren', [ReserverenController::class, 'index'])->name('reserveren.index');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





require __DIR__ . '/auth.php';
