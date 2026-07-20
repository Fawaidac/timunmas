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
        Schema::create('mst_pengguna', function (Blueprint $table) {
            $table->string('nm_user', 50)->primary();
            $table->string('kata_kunci', 255);
            $table->string('no_otor', 20)->nullable();
            $table->string('nama_lengkap', 100)->nullable();
            $table->string('email', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mst_pengguna');
    }
};
