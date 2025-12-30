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
     * @return array<string, mixed>    public function up(): void
    {
        Schema::create("detail_transaksi", function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string("no_transaksi");
            $table->foreign("no_transaksi")->references("no_transaksi")->on("transaksi")->onDelete('cascade');
     */
    public function definition(): array
    {
        return [
            "transaksi_id" => transaksi::factory(),
            "mata_uang" => "USD",
            "jumlah" => fake()->randomFloat(2, 10, 1000),
            "rate" => fake()->randomFloat(2, 1000, 15000),
            "sub_total" => fake()->randomFloat(2, 10000, 1000000)
        ];
    }
}
