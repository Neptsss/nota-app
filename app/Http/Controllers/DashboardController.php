<?php

namespace App\Http\Controllers;

use App\Models\mata_uang;
use App\Models\nasabah;
use App\Models\transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $transaksi = transaksi::all();
        $total = 0;
        foreach ($transaksi as $item) {
            $sub_total = $item->detail_transaksi->sub_total;
            $total += $sub_total;
        }

        return view('dashboard', [
            "title" => "Dashboard",
            "header" => "Dashboard",
            "transaksi" => $transaksi,
            "mata_uang" => mata_uang::all(),
            "nasabah" => nasabah::all(),
            "total" => $total
        ]);
    }
}


