<?php

use App\Http\Controllers\DomaineController;
use App\Http\Controllers\SauvegardeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('wordpress', [DomaineController::class, 'index'])
    ->name('wordpress')
    ->middleware('auth');

Route::post('wordpress', [DomaineController::class, 'store'])
    ->middleware('auth');

Route::get('wordpress/{domaine:slug}', [SauvegardeController::class, 'index'])
    ->middleware('auth');

require __DIR__.'/auth.php';
