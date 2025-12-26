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
        Schema::create("nasabah",function(Blueprint $table){
            $table->id()->autoIncrement();
            $table->string("nama_nasabah");
            $table->string('kode_nasabah')->unique();
            $table->enum("jenis_id",['KTP', 'SIM', 'PASPOR']);
            $table->string("no_id");
            $table->string("no_hp");
            $table->string('foto_id')->nullable();
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nasabah');
    }
};
