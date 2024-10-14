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
        Schema::create('data_barang_masuk', function (Blueprint $table) {
            $table->string('id_barang_masuk', 25)->primary();
            $table->date('tanggal_masuk')->format('d/m/Y');
            $table->string('barang_id');
            $table->foreign('barang_id')->references('kode_barang')->on('data_barang');
            $table->integer('jumlah_masuk', false);
            $table->foreignId('unit_id')->constrained('units', 'id_unit')->nullable();
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_barang_masuks');
    }
};
