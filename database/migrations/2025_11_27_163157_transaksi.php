<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("transaksi", function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('no_transaksi')->unique();
            $table->date('tgl_transaksi');
            $table->unsignedBigInteger('nasabah_id');
            $table->foreign('nasabah_id')->references('id')->on('nasabah');
            $table->enum('jenis_transaksi', ['Beli', 'Jual']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
