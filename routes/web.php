<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiklatController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\PrakerinController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use PhpOffice\PhpSpreadsheet\Worksheet\Row;

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
    Route::redirect('/', '/home');
    Route::get('/home', DashboardController::class)->name('home');
    Route::post('/logout', [UserController::class, 'logout']);

    //tampilan
    Route::get('/diklat', [DiklatController::class, 'view']);
    Route::get('/prakerin', [PrakerinController::class, 'view']);
    Route::get('/inventaris', [InventarisController::class, 'view']);
    Route::get('/sekolah', [SekolahController::class, 'View']);
    Route::get('/diklat/photo/{path}', [DiklatController::class, 'getPhoto']);
    Route::get('/prakerin/photo/{path}', [PrakerinController::class, 'getPhoto']);
    Route::get('/inventaris/photo/{path}', [InventarisController::class, 'getPhoto']);
    Route::inertia('/diklat/add', 'Diklat/Form');
    Route::inertia('/diklat/import', 'Diklat/FormImport');
    Route::post('/diklat/import', [DiklatController::class, 'import']);
    Route::inertia('/prakerin/add', 'Prakerin/Form');
    Route::inertia('/inventaris/add', 'Inventaris/Form');
    Route::inertia('/sekolah/add', 'Sekolah/Form');
    Route::get('/diklat/{id}/edit', [DiklatController::class, 'editPage']);
    Route::get('/prakerin/{id}/edit', [PrakerinController::class, 'editPage']);
    Route::get('/inventaris/{id}/edit', [InventarisController::class, 'editPage']);
    Route::get('/sekolah/{id}/edit', [SekolahController::class, 'editPage']);

    //aksi
    Route::post('/diklat', [DiklatController::class, 'store']);
    Route::post('/prakerin', [PrakerinController::class, 'store']);
    Route::post('/inventaris', [InventarisController::class, 'store']);
    Route::post('/sekolah', [SekolahController::class, 'store']);
    Route::delete('/diklat/{id}', [DiklatController::class, 'delete']);
    Route::delete('/prakerin/{id}', [PrakerinController::class, 'delete']);
    Route::delete('/inventaris/{id}', [InventarisController::class, 'delete']);
    Route::delete('/sekolah/{id}', [SekolahController::class, 'delete']);
    Route::post('/diklat/{id}/edit', [DiklatController::class, 'edit']);
    Route::post('/prakerin/{id}/edit', [PrakerinController::class, 'edit']);
    Route::post('/inventaris/{id}/edit', [InventarisController::class, 'edit']);
    Route::post('/sekolah/{id}/edit', [SekolahController::class, 'edit']);
});
