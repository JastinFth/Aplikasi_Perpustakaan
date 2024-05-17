<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AppController;

use App\Http\Controllers\LoginController;
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
Route::get('/',[AppController::class,"home"]);

Route::get('login',[LoginController::class,"login"]);
Route::post('proses-login',[LoginController::class,"proses_login"]);
Route::get('logout',[LoginController::class,"logout"]);
Route::get('register',[AppController::class,"register"]);
Route::post('proses-register',[LoginController::class,"proses_register"]);
Route::get('/pencarian', [AppController::class, "pencarian"])->name('pencarian');
Route::get('/rekomendasi', [AppController::class, "rekomendasi"])->name('rekomendasi');
Route::get('/kategori/novel', [AppController::class, "kategori_novel"])->name('novel');
Route::get('/kategori/komik', [AppController::class, "kategori_komik"])->name('komik');
Route::get('/kategori/majalah', [AppController::class, "kategori_majalah"])->name('majalah');
Route::get('/kategori/cerita-pendek', [AppController::class, "kategori_cerpen"])->name('cerpen');
Route::get('/kategori/dongeng', [AppController::class, "kategori_dongeng"])->name('dongeng');
Route::get('/buku/{slug}', [AppController::class, 'bookDetail'])->name('book.detail');


Route::group(['prefix' =>'','middleware' => ['auth'], 'as' =>'.'], function(){
    Route::get('tambah-buku',[AppController::class,"tambah_buku"]);
    Route::post('proses-tambah-buku',[AppController::class,"proses_tambah_buku"]);
    Route::get('data/{id}/hapus',[AppController::class,"proses_hapus_buku"]);
    Route::get('kelola',[AppController::class,"kelola"]);
    Route::get('kelola/{id}/edit',[AppController::class,"edit_buku"]);
    Route::post('proses-edit-buku',[AppController::class,"proses_edit_buku"]);
    Route::get('dashboard',[AppController::class,"dashboard"]);
    Route::get('/laporan/download', [AppController::class, "pdfDownload"]);
    Route::get('/laporan', [AppController::class, "generatePDF"]);
});


