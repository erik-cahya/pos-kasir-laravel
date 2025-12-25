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
        Schema::create('barang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_barang')->unique();
            $table->integer('id_kategori');
            $table->text('nama_barang');
            $table->string('merk');
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->string('satuan_barang');
            $table->integer('stok');
            $table->dateTime('tgl_input');
            $table->dateTime('tgl_update');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
