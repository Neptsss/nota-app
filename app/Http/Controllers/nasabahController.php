<?php

namespace App\Http\Controllers;

use App\Models\nasabah;
use Illuminate\Http\Request;

class nasabahController extends Controller
{
    public function index() {
    return view('nasabah.nasabah',[
        "title" => "Nasabah",
        "nasabah" => nasabah::all()
    ]) ;
    }
}
