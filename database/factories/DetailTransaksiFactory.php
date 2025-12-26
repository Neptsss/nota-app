<?php

namespace Database\Factories;

use App\Models\detail_transaksi;
use App\Models\transaksi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DetailTransaksiFactory extends Factory
{

    protected $model = detail_transaksi::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "no_transaksi" => transaksi::factory(),
            "mata_uang" => random_int(1, 4),
            "jumlah" => fake()->randomFloat(2, 10, 1000),
            "rate" => fake()->randomFloat(2, 1000, 15000),
            "sub_total" => fake()->randomFloat(2, 10000, 1000000)
        ];
    }
}
