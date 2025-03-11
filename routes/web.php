<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;

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
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin/reservations', [ReservationController::class, 'adminIndex'])->name('admin.reservations.index');
Route::get('/admin/reservations/create', [ReservationController::class, 'adminCreate'])->name('admin.reservations.create');
Route::post('/admin/reservations', [ReservationController::class, 'adminStore'])->name('admin.reservations.store');
Route::get('/admin/reservations/edit/{reservation}', [ReservationController::class, 'adminEdit'])->name('admin.reservations.edit');
Route::put('/admin/reservations/{reservation}', [ReservationController::class, 'adminUpdate'])->name('admin.reservations.update');
Route::delete('/admin/reservations/{reservation}', [ReservationController::class, 'adminDestroy'])->name('admin.reservations.destroy');

Route::get('/reservations/create', [ReservationController::class, 'create'])->name('reservations.create');
Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');

Route::get('/reservations/input-phone', [ReservationController::class, 'inputPhone'])->name('reservations.input-phone');
Route::post('/reservations/search', [ReservationController::class, 'searchbyPhone'])->name('reservations.search');

require __DIR__.'/auth.php';
