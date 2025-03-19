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
            $table->string('nama_barang',100);
            $table->foreignId('kategori_id')->nullable()->constrained('kategori','id_kategori')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('unit_id')->nullable()->constrained('unit', 'id_unit')->nullOnDelete()->cascadeOnUpdate();
            $table->integer('stock')->default(0);

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
