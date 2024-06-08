<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller {
    public function index(Mahasiswa $mahasiswa) {
        $data = Mahasiswa::all ();
        return view('DataMahasiswa.modules.index', compact('data'));
    }

    public function store(Request $request){
        $validateData = $request->validate ([
            "email" => "required|max:100|email|unique:mahasiswas,email",
            "nama" => "required|max:30",
            "npm" => "required|max:30|unique:mahasiswas,npm",
        ]);

        Mahasiswa::create($validateData);

        return redirect('/')->with('success',"Data sukses disimpan");
    }
}
