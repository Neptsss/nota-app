<?php

namespace Database\Seeders;

use App\Models\mata_uang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataUangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['mata_uang' => 'AED', 'negara' => 'United Arab Emirates'],
            ['mata_uang' => 'AUD', 'negara' => 'Australia'],
            ['mata_uang' => 'BHD', 'negara' => 'Bahrain'],
            ['mata_uang' => 'BND', 'negara' => 'Brunei Darussalam'],
            ['mata_uang' => 'SAR', 'negara' => 'Saudi Arabia'],
            ['mata_uang' => 'CAD', 'negara' => 'Canada'],
            ['mata_uang' => 'CHF', 'negara' => 'Switzerland'],
            ['mata_uang' => 'CNY', 'negara' => 'China'],
            ['mata_uang' => 'TWD', 'negara' => 'Taiwan'],
            ['mata_uang' => 'EUR', 'negara' => 'European Union'],
            ['mata_uang' => 'GBP', 'negara' => 'United Kingdom'],
            ['mata_uang' => 'HKD', 'negara' => 'Hong Kong'],
            ['mata_uang' => 'IDR', 'negara' => 'Indonesia'],
            ['mata_uang' => 'JPY', 'negara' => 'Japan'],
            ['mata_uang' => 'KRW', 'negara' => 'South Korea'],
            ['mata_uang' => 'MYR', 'negara' => 'Malaysia'],
            ['mata_uang' => 'SGD', 'negara' => 'Singapore'],
            ['mata_uang' => 'USD', 'negara' => 'United States'],
            ['mata_uang' => 'VND', 'negara' => 'Vietnam'],
            ['mata_uang' => 'ZAR', 'negara' => 'South Africa'],
            ['mata_uang' => 'INR', 'negara' => 'India'],
        ];

        $data = array_map(function ($item) {
            return array_merge($item, [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }, $data);

        DB::table('mata_uang')->insert($data);
    }
}
