<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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
    return view('login');
});
Route::get('/login', function () {
    return view('login');
});
Route::post('/postlogin', [MainController::class, 'postlogin']);
Route::get('/home', [MainController::class, 'home']);
Route::get('/new_post', [MainController::class, 'new_post']);
Route::post('/posting', [MainController::class, 'posting'])->name('post-simpan');
Route::get('/detail_post/{id}', [MainController::class, 'detail_post']);
Route::get('/logout', [MainController::class, 'logout']);