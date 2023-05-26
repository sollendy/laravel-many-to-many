<?php

use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TechnologyController;
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
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// diciamo che le rotte di amministrazione devono:
// avere tutte il prefisso "admin/" nell'url
// il nome delle rotte inizi con "admin."
// vorrei se possibile fare questo in automatico, senza specificarlo per ogni nuova rotta

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function() {

    // rotte resource dei project
    Route::resource('projects', ProjectController::class)->parameters(['projects' => 'project:slug']);

    Route::resource('types', TypeController::class)->parameters(['types' => 'type:slug']);

    Route::resource('technologies', TechnologyController::class)->parameters(['technologies' => 'technology:slug']);

    Route::get('/', [DashboardController::class, 'home'])->name('home');
});


require __DIR__.'/auth.php';