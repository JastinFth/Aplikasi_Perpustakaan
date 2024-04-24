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

    public function dashboard(){
        return view("dashboard");
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
<<<<<<< HEAD
     
    
=======
    public function dashboard(Request $request){
        $books = Book::get();

        $data = ([
            'books' => $books,
        ]);
        return view("dashboard",$data);
    }

>>>>>>> 120d4082dd08e4a66afd1c492a3533bb73dcd290
}

