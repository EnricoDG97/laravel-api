<?php

use App\Http\Controllers\Admin\ArchivedController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\ProfileController;
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

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');

// });

Route::middleware(['auth', 'verified'])
    // nome rotta visibile in route list: admin. + nome rotta
    ->name('admin.')
    // il prefisso invece è per l'url
    ->prefix('admin')
    ->group(function () {
        // route dashboard admin
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // route di test per ottenere i messaggi dagli errori
        Route::get('/messages', function () {
            return 'messages';
        })->name('messages');

        // aggiungo rotta per il resource controller dei projects
        Route::resource('projects', ProjectController::class)->parameters(['projects' => 'project:slug']);
        // aggiungo rotta per il resource controller dei projects archived
        Route::resource('archived', ArchivedController::class)->parameters(['projects' => 'project:slug']);
        // aggiungo rotta per il resource controller delle types
        Route::resource('types', TypeController::class)->parameters(['types' => 'type:slug']);
    });



require __DIR__ . '/auth.php';
