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
        Schema::table('customer', function (Blueprint $table) {
            if (!Schema::hasColumn('customer', 'nm_peg'))
                $table->string('nm_peg', 100)->nullable()->after('nm_cust');
            if (!Schema::hasColumn('customer', 'kategori'))
                $table->string('kategori', 50)->nullable()->after('nm_peg');
            if (!Schema::hasColumn('customer', 'wilayah'))
                $table->string('wilayah', 100)->nullable()->after('alm_cust');
            if (!Schema::hasColumn('customer', 'telp2'))
                $table->string('telp2', 20)->nullable()->after('telp');
            if (!Schema::hasColumn('customer', 'hp'))
                $table->string('hp', 20)->nullable()->after('telp2');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customer', function (Blueprint $table) {
            $table->dropColumn(['nm_peg', 'kategori', 'wilayah', 'telp2', 'hp']);
        });
    }
};
