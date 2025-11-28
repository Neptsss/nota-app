<?php

namespace Database\Seeders;

use App\Models\nasabah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NasabahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        nasabah::create([
            "nama_nasabah" => "User1",
            "jenis_id" => "KTP",
            "no_id" => "2426661381",
            "no_hp" => "0881817171"
        ]);

        nasabah::create([
            "nama_nasabah" => "User2",
            "jenis_id" => "KTP",
            "no_id" => "2426661381",
            "no_hp" => "0881817171"
        ]);

        nasabah::create([
            "nama_nasabah" => "User3",
            "jenis_id" => "KTP",
            "no_id" => "2426661381",
            "no_hp" => "0881817171"
        ]);
    }
}
