<?php

namespace App\Http\Controllers;

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
    public function edit_buku(){
        return view("edit_buku");
    }
    public function hapus_buku(){
        return view("hapus_buku");
    }
}
