<?php

use App\Models\Medewerkers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ScoresController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReserverenController;
use App\Http\Controllers\MedewerkersController;
use App\Http\Controllers\DylanMedewerkerController;
use App\Http\Controllers\WesselMedewerkersController;


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
    Route::get('/dylan', [DylanMedewerkerController::class, 'index'])->name('dylan.index');
    Route::get('/dylan/show', [DylanMedewerkerController::class, 'show'])->name('dylan.show');
    Route::get('/dylan/edit/{id}', [DylanMedewerkerController::class, 'edit'])->name('dylan.edit');
    Route::post('/dylan/update/{id}', [DylanMedewerkerController::class, 'update'])->name('dylan.update');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/Wessel', [WesselMedewerkersController::class, 'indexPakket'])->name('Wessel.index');
    Route::get('/Wessel/edit/{id}', [WesselMedewerkersController::class, 'edit'])->name('Wessel.edit');
    Route::put('/Wessel/update/{id}', [WesselMedewerkersController::class, 'updatePakket'])->name('Wessel.update');
});

Route::middleware(['auth', 'role'])->group(function () {
    Route::get('/medewerkers', [MedewerkersController::class, 'index'])->name('medewerkers.index');
    Route::get('/mederwerkers/user/{id}', [MedewerkersController::class, 'userReservations'])->name('allreservations.user');
    Route::get('reservation/edit/{id}', [MedewerkersController::class, 'edit'])->name('reservation.edit');
    Route::put('medewerkers/{id}', [MedewerkersController::class, 'update'])->name('medewerkers.update');
    Route::delete('/reservation/{id}', [MedewerkersController::class, 'destroy'])->name('reservation.destroy');
    Route::get('/users', [MedewerkersController::class, 'show'])->name('users.show');
    Route::post('/users/{id}/make-medewerker', [MedewerkersController::class, 'makeMedewerker'])->name('users.make-medewerker');
    Route::post('/users/{id}/make-klant', [App\Http\Controllers\MedewerkersController::class, 'makeKlant'])->name('users.make-klant');
});
Route::middleware('auth')->group(function () {
    Route::get('/reserveren', [ReserverenController::class, 'index'])->name('reserveren.index');
    Route::post('/reserveren', [ReserverenController::class, 'store'])->name('reserveren.store');
    Route::get('/reserveren/{id}', [ReserverenController::class, 'show'])->name('reserveren.show');
    Route::delete('/reserveren/{id}', [ReserverenController::class, 'destroy'])->name('reserveren.destroy');
    Route::get('/reserveren/{id}/edit', [ReserverenController::class, 'edit'])->name('reserveren.edit');
    Route::put('/reserveren/{id}', [ReserverenController::class, 'update'])->name('reserveren.update');
});

Route::middleware(['auth', 'role'])->group(function () {
    Route::get('/medewerkers', [MedewerkersController::class, 'index'])->name('medewerkers.index');
    Route::get('/mederwerkers/user/{id}', [MedewerkersController::class, 'userReservations'])->name('allreservations.user');
    Route::get('reservation/edit/{id}', [MedewerkersController::class, 'edit'])->name('reservation.edit');
    Route::put('medewerkers/{id}', [MedewerkersController::class, 'update'])->name('medewerkers.update');
    Route::delete('/reservation/{id}', [MedewerkersController::class, 'destroy'])->name('reservation.destroy');
    Route::get('/users', [MedewerkersController::class, 'show'])->name('users.show');
    Route::post('/users/{id}/make-medewerker', [MedewerkersController::class, 'makeMedewerker'])->name('users.make-medewerker');
    Route::post('/users/{id}/make-klant', [App\Http\Controllers\MedewerkersController::class, 'makeKlant'])->name('users.make-klant');
});

Route::middleware('auth')->group(function () {
    Route::get('/reserveren', [ReserverenController::class, 'index'])->name('reserveren.index');
    Route::post('/reserveren', [ReserverenController::class, 'store'])->name('reserveren.store');
    Route::get('/reserveren/{id}', [ReserverenController::class, 'show'])->name('reserveren.show');
    Route::delete('/reserveren/{id}', [ReserverenController::class, 'destroy'])->name('reserveren.destroy');
    Route::get('/reserveren/{id}/edit', [ReserverenController::class, 'edit'])->name('reserveren.edit');
    Route::put('/reserveren/{id}', [ReserverenController::class, 'update'])->name('reserveren.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/scores', [ScoresController::class, 'index'])->name('scores.index');
    Route::get('/games', [GameController::class, 'index'])->name('games.index');
    Route::get('/games/{id}', [GameController::class, 'show']);
    Route::get('/games/{game}', [GameController::class, 'show'])->name('games.show');

    Route::post('/scores', [ScoreController::class, 'store']);

    Route::get('/players/{player_id}/scores', [PlayerController::class, 'scores'])->name('player.scores');
    Route::get('/players', [ScoreController::class, 'getPlayersByGame'])->name('players.by_game');

    Route::get('/scores/{score_id}/edit', [ScoreController::class, 'edit'])->name('scores.edit');
    Route::delete('/scores/{score_id}', [ScoreController::class, 'destroy'])->name('scores.destroy');
    Route::patch('/scores/{score_id}', [ScoreController::class, 'update'])->name('scores.update');
    Route::get('/scores/create', [ScoreController::class, 'create'])->name('scores.create');
    Route::post('/scores', [ScoreController::class, 'store'])->name('scores.store');




    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/reserveren', [ReserverenController::class, 'index'])->name('reserveren.index');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





require __DIR__ . '/auth.php';
