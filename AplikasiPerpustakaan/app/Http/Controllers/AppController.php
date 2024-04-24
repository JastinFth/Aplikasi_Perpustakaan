<?php

namespace App\Http\Controllers;
use App\models\Book;
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
    public function edit_buku(){
        return view("edit_buku");
    }
    public function dashboard(Request $request){
        $books = Book::get();

        $data = ([
            'books' => $books,
        ]);
        return view("dashboard",$data);
    }

}

