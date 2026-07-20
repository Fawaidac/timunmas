<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('mst_pengguna', function (Blueprint $table) {
            $table->enum('role', ['admin', 'sales'])->default('sales')->after('kata_kunci');
        });

        DB::table('mst_pengguna')->where('nm_user', 'admin')->update(['role' => 'admin']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mst_pengguna', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};
