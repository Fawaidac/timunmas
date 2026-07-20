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
        Schema::create('kunjungan_sales', function (Blueprint $table) {
            $table->id();
            $table->string('nm_user', 50);
            $table->string('kd_cust', 20);
            $table->string('nm_cust', 100);
            $table->date('tanggal_kunjungan');
            $table->time('waktu_kunjungan')->nullable();
            $table->text('catatan')->nullable();
            $table->enum('status', ['kunjungan', 'order_dibuat'])->default('kunjungan');
            $table->string('order_no', 50)->nullable();
            $table->timestamps();
            
            $table->foreign('nm_user')->references('nm_user')->on('mst_pengguna')->onDelete('cascade');
            $table->foreign('kd_cust')->references('kd_cust')->on('customer')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kunjungan_sales');
    }
};
