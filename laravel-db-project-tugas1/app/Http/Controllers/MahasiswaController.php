<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller {
    public function index(Mahasiswa $mahasiswa) {
        return view('TokoIBIK.modules.products.index', ["data" => $mahasiswa->all()]);
    }

    public function store(Request $request){
        $validateData = $request->validate ([
            "nama" => "required|max:50",
            "npm" => "required|max:25",
            "email" => "required|max:30",
        ]);

        Mahasiswa::create($validateData);

        return redirect('/')->with('success',"Data sukses disimpan");
    }
}
