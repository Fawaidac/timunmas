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
        Schema::create('checkin', function (Blueprint $table) {
            $table->id();
            $table->string('nm_user', 50);
            $table->string('kd_cust', 20);
            $table->string('nm_cust', 100);
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->string('alamat_lengkap', 255)->nullable();
            $table->timestamp('waktu_checkin');
            $table->text('catatan')->nullable();
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
        Schema::dropIfExists('checkin');
    }
};
