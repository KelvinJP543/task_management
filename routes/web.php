<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DashboardController;

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
    // Mengarahkan (redirect) pengguna dari URL '/' langsung ke rute bernama 'login'
    return redirect()->route('login');
});

// 1. Rute Dashboard (Menggunakan DashboardController)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// 2. Rute Task (Menggunakan TaskController)
Route::middleware('auth')->group(function () {
    Route::resource('tasks', TaskController::class);
});


require __DIR__ . '/auth.php';