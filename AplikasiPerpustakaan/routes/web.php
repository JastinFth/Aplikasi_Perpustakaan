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
Route::get('login',[AppController::class,"login"]);
Route::get('/',[AppController::class,"home"]);
Route::get('register',[AppController::class,"register"]);
Route::get('tambah-buku',[AppController::class,"tambah_buku"]);
Route::post('proses-tambah-buku',[AppController::class,"proses_tambah_buku"]);
Route::get('data/{id}/hapus',[AppController::class,"proses_hapus_buku"]);
Route::get('kelola',[AppController::class,"kelola"]);
Route::get('kelola/{id}/edit',[AppController::class,"edit_buku"]);
Route::post('proses-edit-buku',[AppController::class,"proses_edit_buku"]);