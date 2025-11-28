<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;

class transaksiController extends Controller
{
    public function index(){
        return view('transaksi.transaksi', [
            "title" => "Transaksi",
            "transaksi" => transaksi::all()
        ]);
    }

    public function create(){
        // return view('')
    }
}
