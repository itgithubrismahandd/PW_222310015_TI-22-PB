<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function regist (Request $request){


    }

    public function login (Request $request){
        $credentials = $request->validate([ //untuk menvalidasi
            "email"=> "required|email:dns", //required mengharuskan diisi
            "password"=>"required"
        ]); //mengambil email dan password ke database

        if (Auth::attempt($credentials)){ //kondisi untuk mengecek auth apakah benar atau tidak
            $request->session()->regenerate(); //pakai regenerate untuk merefresh selalu kode dalam session

            return redirect()->intended("/admin"); //mengecek apabila sudah benar maka akan  berpindah ke halaman admin
        }

        return back()->with('loginError', 'Email atau password tidak cocok'); //kalau salah kembali ke tampilan awal dan memberi tahu pesan error
    }

    public function register (Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['nama'] = $validatedData['name'];

        User::create($validatedData);

        return redirect('/')->with('success', 'Registration successful! Please sign in.');
    }

    public function logout (Request $request){
        Auth::logout(); //fungsi untuk logout dari auth

        $request->session()->invalidate(); //invalidate menghapus session login
        $request->session()->regenerateToken(); //regenerateToken memperbarui session

        return redirect('/'); //('/')mengembalikan kehalaman utama
    }
}
