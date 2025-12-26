<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\transaksi>
 */
class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "no_transaksi" => fake()->unique()->randomDigit(),
            "tgl_transaksi" => fake()->date(),
            "nasabah_id" => random_int(1, 2),
            "jenis_transaksi" => fake()->randomElement(['Beli', 'Jual'])
        ];
    }
}
