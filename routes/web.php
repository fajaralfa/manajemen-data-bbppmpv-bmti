<?php

use App\Http\Controllers\UvutController;
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

Route::inertia('/login', 'Login');
Route::inertia('/home', 'Home');
Route::get('/test', function () {
    return inertia('TestPage', [
        'text' => 'Text From Laravel',
    ]);
});
Route::inertia('/other', 'OtherPage');
Route::inertia('/tabel', 'TableTestPage');
Route::inertia('/sidebar', 'Sidebar');
