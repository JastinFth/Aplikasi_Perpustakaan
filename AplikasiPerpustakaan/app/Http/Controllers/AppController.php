<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function home(){
        return view("home");
    }
}
