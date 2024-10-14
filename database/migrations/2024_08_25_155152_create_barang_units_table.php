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
        Schema::create('barang_unit', function (Blueprint $table) {
            $table->string('barang_id');
            $table->foreign('barang_id')->references('kode_barang')->on('data_barang')->cascadeOnDelete();
            $table->foreignId('unit_id')->constrained('units', 'id_unit');
            $table->integer('conversion_unit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_units');
    }
};
