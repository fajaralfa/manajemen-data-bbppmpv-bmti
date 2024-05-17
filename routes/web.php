<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiklatController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\PrakerinController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthRoleAdmin;
use App\Http\Middleware\Unauthenticated;
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
Route::middleware(Unauthenticated::class)->group(function () {
    Route::inertia('/login', 'Login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::redirect('/', '/home');
    Route::get('/home', DashboardController::class)->name('home');
    Route::post('/logout', [AuthController::class, 'logout']);

    // prakerin
    Route::get('/prakerin', [PrakerinController::class, 'view']);
    Route::get('/prakerin/{id}', [PrakerinController::class, 'viewDetail'])->where('id', '[0-9]+');
    Route::get('/prakerin/{id}/export', [PrakerinController::class, 'export']);
    Route::get('/prakerin/photo/{path}', [PrakerinController::class, 'getPhoto']);
    Route::inertia('/prakerin/add', 'Prakerin/Form');
    Route::inertia('/prakerin/import', 'Prakerin/FormImport');
    Route::post('/prakerin/import', [PrakerinController::class, 'import']);
    Route::get('/prakerin/{id}/edit', [PrakerinController::class, 'editPage']);
    Route::post('/prakerin', [PrakerinController::class, 'store']);
    Route::post('/prakerin/{id}/edit', [PrakerinController::class, 'edit']);

    // diklat
    Route::get('/diklat', [DiklatController::class, 'view']);
    Route::get('/diklat/photo/{path}', [DiklatController::class, 'getPhoto']);
    Route::inertia('/diklat/add', 'Diklat/Form');
    Route::inertia('/diklat/import', 'Diklat/FormImport');
    Route::post('/diklat/import', [DiklatController::class, 'import']);
    Route::get('/diklat/{id}/edit', [DiklatController::class, 'editPage']);
    Route::post('/diklat', [DiklatController::class, 'store']);
    Route::post('/diklat/{id}/edit', [DiklatController::class, 'edit']);

    // sekolah
    Route::get('/sekolah', [SekolahController::class, 'View']);
    Route::get('/sekolah/{id}/edit', [SekolahController::class, 'editPage']);
    Route::post('/sekolah', [SekolahController::class, 'store']);
    Route::inertia('/sekolah/add', 'Sekolah/Form');
    Route::post('/sekolah/{id}/edit', [SekolahController::class, 'edit']);

    // inventaris
    Route::get('/inventaris', [InventarisController::class, 'view']);
    Route::get('/inventaris/photo/{path}', [InventarisController::class, 'getPhoto']);
    Route::inertia('/inventaris/add', 'Inventaris/Form');
    Route::inertia('/inventaris/import', 'Inventaris/FormImport');
    Route::post('/inventaris/import', [InventarisController::class, 'import']);
    Route::get('/inventaris/{id}/edit', [InventarisController::class, 'editPage']);
    Route::post('/inventaris', [InventarisController::class, 'store']);
    Route::post('/inventaris/{id}/edit', [InventarisController::class, 'edit']);

    Route::middleware(AuthRoleAdmin::class)->group(function () {
        Route::delete('/diklat/{id}', [DiklatController::class, 'delete']);
        Route::delete('/prakerin/{id}', [PrakerinController::class, 'delete']);
        Route::delete('/inventaris/{id}', [InventarisController::class, 'delete']);
        Route::delete('/sekolah/{id}', [SekolahController::class, 'delete']);

        Route::inertia('/user/add', 'Users/Add');
        Route::post('/user/add', [UserController::class, 'register']);
        Route::get('/user', [UserController::class, 'view']);
    });
});
