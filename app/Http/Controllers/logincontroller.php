<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class logincontroller extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login(Request $request){
        $request->validate([
            "username" => "required",
            "password" =>  "required" 
        ],[
            "username.required" => "Nama wajib diisi",
            "password.required" => "password wajib diisi"
        ]);
    
    $informasi = [
        "username" => $request->username,
        "password" => $request->password
    ];

    if(Auth::attempt($informasi)){
        if(Auth::user()->role == 'admin'){
            return redirect('admin');
        }elseif(Auth::user()->role = 'user'){
            return redirect('user');
        }


    
    }else{
        return redirect('')->withErrors('Gagal', "Username atau password salah");
    }
}

public function logout(){
    Auth::logout();
    return redirect('');
}

public function yuhu(){
    return view("auth.register");
}

public function register(Request $request){
     $request->validate([
        'noktp' => 'required|unique:users',
        'tgl_lahir' => 'required|date',
        'email' => 'required|email|unique:users',
        'notelp' => 'required|unique:users',
        'username' => 'required|unique:users',
        'password' => 'required|min:8',
    ]);

    $user = new User();
    $user->noktp = $request->noktp;
    $user->nama = $request->nama;
    $user->email = $request->email;
    $user->tgl_lahir = $request->tgl_lahir;
    $user->username = $request->input('username');
    $user->password = bcrypt($request->input("password"));
    $user->notelp = $request->notelp;
    
    $user->save();

    if($user){
        return redirect()->route("login")->with("success", "Data register berhasil disimpan");
    }else{
        return redirect()->route("login")->with("error", "Data register tak bisa di isi");
    }
}

}
