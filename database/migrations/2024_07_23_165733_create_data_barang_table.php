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
        Schema::create('data_barang', function (Blueprint $table) {
            $table->string('kode_barang', 25)->primary();
            $table->string('nama_barang');
            $table->foreignId('category_id')->constrained('kategoris', 'id_category');
            $table->integer('stock')->default(0);
            $table->enum('satuan', ['Pcs', 'Roll', 'M', 'M2']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_barang');
    }
};
