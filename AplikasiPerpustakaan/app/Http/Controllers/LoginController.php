<?php

namespace App\Http\Controllers;
use App\models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
     public function login(){
        return view("login");
    }

    public function index(){
        return view('auth.login');
    }
    public function proses_login(Request $request){
        // dd($request->all());
        $request->validate([
            'email'     => 'required',
            'password'  => 'required',
        ]);
        $data =[
            'email'     => $request->email,
            'password'     => $request->password,
        ];

        if(Auth::attempt($data)){
            return redirect("dashboard");
        }else{
            return redirect('login')->with('failed',"email atau password salah");
        }
    }
    public function logout(){
        // dd("oke");
        Auth::logout();
        return redirect("login")->with('logoutmsg','Yaaahhh Kamu Telah Logout Dari Perisyad');
    }
    public function register(){
        return view('auth.register');
    }
    public function proses_register(Request $request){
        // dd($request->all());
        $request->validate([
            'email'      => 'required|email|unique:users,email',
            'password'      => 'required|min:8', 
        ]);
        $data['email']          = $request->email;
        $data['password']       = Hash::make($request->password);

        User::create($data);
    return redirect('login');

        $login =[
            'email'     => $request->email,
            'password'     => $request->password,
        ];

        if(Auth::attempt($login)){
            return redirect()->route("dashboard");
        }else{
            return redirect('login')->with('failed',"email atau password salah");
        }
    }
}
