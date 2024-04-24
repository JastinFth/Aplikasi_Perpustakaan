<?php

namespace App\Http\Controllers;
use App\models\Book;
use App\Models\Bookshelf;
use App\Models\Category;
use App\Models\Recommendation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class AppController extends Controller
{
    public function home(){
        return view("home");
    }
    public function tambah_buku(){
        return view("tambah_buku");
    }
    public function login(){
        return view("login");
    }
    public function register(){
        return view("register");
    }
    public function edit_buku(){
        return view("edit_buku");
    }

    public function dashboard(Request $request){
        $books = Book::get();
        $recomendations = Recommendation::get();
        $categories = Category::get();
        $bookshelfs = Bookshelf::get();

        $data = ([
            'books' => $books,
            'recommendations' => $recomendations,
            'categories' => $categories,
            'bookshelfs' => $bookshelfs,

        ]);

        return view("dashboard",$data) ;
    }
}  


