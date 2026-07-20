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
            $table->string('kd_brg', 20)->primary();
            $table->string('nm_brg', 150);
            $table->string('satuan1', 20)->nullable();
            $table->decimal('harga_jl', 15, 2)->default(0);
            $table->decimal('stok_a', 15, 2)->default(0);
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
