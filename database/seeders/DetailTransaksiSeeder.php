<?php

namespace Database\Seeders;

use App\Models\detail_transaksi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailTransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        detail_transaksi::create([
            "no_transaksi"=> "transaksi_28_11_2025",
            "id_mata_uang" => 1,
            "jumlah" => 24.210,
            "rate" => 16.000,
            "sub_total"=>89.3121
        ]);
    }
}
