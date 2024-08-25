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
        Schema::create('data_barang_keluar', function (Blueprint $table) {
            $table->string('id_barang_keluar')->primary();
            $table->date('tanggal_keluar')->format('d/m/Y');
            $table->string('barang_id', 25);
            // mendefinisikan table relasi id barang
            $table->foreign('barang_id')->references('kode_barang')->on('data_barang');
            $table->integer('jumlah_keluar', false);
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_barang_keluars');
    }
};
