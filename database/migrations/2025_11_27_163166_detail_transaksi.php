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
        Schema::create("detail_transaksi", function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string("no_transaksi");
            $table->foreign("no_transaksi")->references("no_transaksi")->on("transaksi")->onDelete('cascade');
            $table->unsignedBigInteger("id_mata_uang");
            $table->foreign("id_mata_uang")->references("id")->on("mata_uang")->onDelete('cascade');
            $table->decimal("jumlah", 19, 2);
            $table->decimal("rate", 19, 2);
            $table->decimal("sub_total", 19, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi');
    }
};
