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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->string('no_bayar', 50)->unique();
            $table->string('nm_user', 50);
            $table->string('kd_cust', 20);
            $table->string('nm_cust', 100);
            $table->string('no_faktur', 50);
            $table->decimal('nominal', 15, 2);
            $table->enum('metode_bayar', ['cash', 'transfer'])->default('cash');
            $table->text('keterangan')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->string('approved_by', 50)->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->text('reject_reason')->nullable();
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
        Schema::dropIfExists('pembayaran');
    }
};
