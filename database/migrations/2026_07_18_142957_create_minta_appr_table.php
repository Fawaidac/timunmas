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
        Schema::create('minta_appr', function (Blueprint $table) {
            $table->string('nomor', 30)->primary();
            $table->date('tgl_minta');
            $table->time('jam_minta')->nullable();
            $table->string('kd_user', 50);
            $table->text('keterangan')->nullable();
            $table->string('kd_user_appr', 50)->nullable();
            $table->date('tgl_appr')->nullable();
            $table->time('jam_appr')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('minta_appr');
    }
};
