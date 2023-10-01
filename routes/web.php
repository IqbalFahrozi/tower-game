<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TowerController;
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


Route::get('/tower', [TowerController::class, 'index'])->name('tower');
Route::get('/reveal-cell', [TowerController::class, 'revealCell'])->name('reveal-cell');
Route::post('/reset-game', [TowerController::class, 'resetGame'])->name('reset-game');



Route::get('/', function () {
    return view('welcome');
});
