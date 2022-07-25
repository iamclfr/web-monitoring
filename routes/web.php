<?php

use App\Http\Controllers\AdminController;
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

/*
 *  DOMAINES
*/
Route::get('wordpress', [DomaineController::class, 'index'])
    ->name('wordpress')
    ->middleware('auth');

Route::post('wordpress', [DomaineController::class, 'store'])
    ->middleware('auth');

Route::get('wordpress/{domaine:slug}/edit', [DomaineController::class, 'edit'])
    ->middleware('auth');

Route::patch('wordpress/{domaine:slug}', [DomaineController::class, 'update'])
    ->middleware('auth');

Route::delete('wordpress/{domaine:slug}', [DomaineController::class, 'destroy'])
    ->middleware('auth');

/*
 *  SAUVEGARDES
*/
Route::get('wordpress/{domaine:slug}', [SauvegardeController::class, 'index'])
    ->middleware('auth');

Route::post('wordpress/{domaine:slug}', [SauvegardeController::class, 'store'])
    ->middleware('auth');

Route::get('wordpress/{domaine:slug}/{sauvegarde:slug}/edit', [SauvegardeController::class, 'edit'])
    ->middleware('auth');

Route::patch('wordpress/{domaine:slug}/{sauvegarde:slug}', [SauvegardeController::class, 'update'])
    ->middleware('auth');

Route::delete('wordpress/{domaine:slug}/{sauvegarde:slug}', [SauvegardeController::class, 'destroy'])
    ->middleware('auth');

/*
 *  ADMINISTRATION
*/
Route::get('admin', [AdminController::class, 'index'])
    ->name('admin')
    ->middleware('auth');

Route::get('admin/import', [AdminController::class, 'import'])
    ->middleware('auth');

require __DIR__.'/auth.php';
