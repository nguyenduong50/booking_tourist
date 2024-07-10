<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TravelPackageController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TransactionController;

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

Route::get('/', [ClientController::class, 'Home']);
Route::get('/travel_package', [ClientController::class, 'Travel_Package']);
Route::post('/booking-page', [ClientController::class, 'Booking_Page'])->middleware(['auth', 'verified']);
Route::post('/booking', [ClientController::class, 'Booking'])->middleware('auth');
Route::get('/transaction', [ClientController::class, 'Transaction'])->middleware('auth');

Auth::routes([
    'verify' => true
]);

Route::get('/verify', [UserController::class, 'verify']);

Route::middleware(['auth', 'roleAdmin'])->group(function () {
    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/admin/user', UserController::class)->names('admin_user');
    Route::resource('/admin/post', PostController::class)->names('admin_post');
    Route::resource('/admin/travel_package', TravelPackageController::class)->names('admin_travel_package');
    Route::resource('/admin/transaction', TransactionController::class)->names('admin_transaction');
    Route::get('/admin/transaction/confirm/{id}', [TransactionController::class, 'confirm'])->name('admin_transaction_confirm');
    Route::get('/admin/transaction/cancel/{id}', [TransactionController::class, 'cancel'])->name('admin_transaction_cancel');
});