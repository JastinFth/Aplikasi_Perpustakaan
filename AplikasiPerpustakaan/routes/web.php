<?php

use Illuminate\Support\Facades\Route; 

use App\Http\Controllers\AppController;
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
    return view('home');
});

Route::get('dashboard',[AppController::class,"dashboard"]);
Route::get('home',[AppController::class,"home"]);
Route::get('tambah-buku',[AppController::class,"tambah_buku"]);
Route::get('edit-buku',[AppController::class,"edit_buku"]);
