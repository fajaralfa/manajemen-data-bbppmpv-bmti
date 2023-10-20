<?php

use App\Http\Controllers\DiklatController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\PrakerinController;
use App\Http\Controllers\UserController;
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

//autentikasi
Route::inertia('/register', 'Register');
Route::post('/register', [UserController::class, 'register']);
Route::inertia('/login', 'Login')->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::post('/logout', [UserController::class, 'logout']);
    Route::inertia('/home', 'Home')->name('home');

    //tampilan
    Route::get('/diklat', [DiklatController::class, 'view']);
    Route::get('/prakerin', [PrakerinController::class, 'view']);
    Route::get('/inventaris', [InventarisController::class, 'view']);
    Route::inertia('/diklat/add', 'Diklat/Form');
    Route::inertia('/prakerin/add', 'Prakerin/Form');
    Route::inertia('/inventaris/add', 'Inventaris/Form');
    Route::get('/diklat/{id}/edit', [DiklatController::class, 'edit']);
    Route::get('/prakerin/{id}/edit', [PrakerinController::class, 'edit']);
    Route::get('/inventaris/{id}/edit', [InventarisController::class, 'edit']);

    //aksi
    Route::post('/diklat', [DiklatController::class, 'store']);
    Route::post('/prakerin', [PrakerinController::class, 'store']);
    Route::post('/inventaris', [InventarisController::class, 'store']);
    Route::delete('/diklat/{id}', [DiklatController::class, 'delete']);
    Route::delete('/prakerin/{id}', [PrakerinController::class, 'delete']);
    Route::delete('/inventaris/{id}', [InventarisController::class, 'delete']);
    Route::put('/diklat/{id}', [DiklatController::class, 'update']);
    Route::put('/prakerin/{id}', [PrakerinController::class, 'update']);
    Route::put('/inventaris/{id}', [InventarisController::class, 'update']);
});
