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
        Schema::create('mst_ord_jual', function (Blueprint $table) {
            $table->string('no_ent', 30)->primary();
            $table->date('tanggal');
            $table->string('kd_cust', 20);
            $table->string('nm_cust', 100)->nullable();
            $table->text('alm_cust')->nullable();
            $table->decimal('total', 15, 2)->default(0);
            $table->string('kd_user', 50)->nullable();
            $table->string('nm_peg', 100)->nullable();

            // Foreign key
            $table->foreign('kd_cust')->references('kd_cust')->on('customer')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mst_ord_jual');
    }
};
