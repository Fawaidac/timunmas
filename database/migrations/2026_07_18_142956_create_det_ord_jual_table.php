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
        Schema::create('det_ord_jual', function (Blueprint $table) {
            $table->id();
            $table->string('no_ent', 30);
            $table->string('kd_brg', 20);
            $table->string('nm_brg', 150)->nullable();
            $table->decimal('qty', 15, 2)->default(0);
            $table->decimal('harga', 15, 2)->default(0);
            $table->decimal('subtotal', 15, 2)->default(0);

            // Foreign keys
            $table->foreign('no_ent')->references('no_ent')->on('mst_ord_jual')->onDelete('cascade');
            $table->foreign('kd_brg')->references('kd_brg')->on('barang')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('det_ord_jual');
    }
};
