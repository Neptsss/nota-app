<?php

namespace App\Http\Controllers;

use App\Models\mata_uang;
use Illuminate\Http\Request;

class notaController extends Controller
{
    public function view()
    {
        return view('nota', [
            'title' => "Nota Transaksi",
            "mata_uang" => mata_uang::all()
        ]);
    }
}
