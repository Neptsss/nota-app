<?php

namespace Database\Seeders;

use App\Models\transaksi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        transaksi::create([
            "no_transaksi" => "transaksi_28_11_2025",
            "tgl_transaksi"=>Date::now("Asia/Jakarta"),
            "id_nasabah" => 1,
            "jenis_transaksi" => "Beli",
            "total_harga"=>21.0321321
        ]);
    }
}
