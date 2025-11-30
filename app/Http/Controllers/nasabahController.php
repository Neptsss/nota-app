<?php

namespace App\Http\Controllers;

use App\Models\nasabah;
use Illuminate\Http\Request;

class nasabahController extends Controller
{
    public function index()
    {
        return view('nasabah.nasabah', [
            "title" => "Nasabah",
            "header"=>"Daftar Nasabah",
            "nasabah" => nasabah::all()
        ]);
    }

    public function show(){
        return view('nasabah.show',[
            "title" => "Nasabah | Nama nasabah",
            "header"=>"Nama nasabah"

        ]);
    }
}
