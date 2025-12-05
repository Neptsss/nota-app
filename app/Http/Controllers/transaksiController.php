<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;

class transaksiController extends Controller
{
    public function index(){
        return view('transaksi.transaksi', [
            "title" => "Transaksi",
            "header"=>"Daftar Transaksi",
            // "transaksi" => transaksi::all()
        ]);
    }

    public function show(){
        return view('transaksi.show',[
            "title" => "Transaksi | Detail Transaksi",
            "header" => "Detail Transaksi"
        ]);
    }

    public function create(){
        return view('transaksi.create',[
            "title" => "Transaksi | Tambah Create",
            "header" =>"Nota Penukaran Valuta Asing"
        ]);
    }
 public function edit(){
    return view('transaksi.edit', [
        "title" => "Transaksi | Edit ",
        "header" =>"Edit Nota Penukaran Valuta Asing"
    ]);
 }

}
