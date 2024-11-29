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
        Schema::table('tbl_history_registrasi_vendor', function (Blueprint $table) {
	        $table->foreignId('kode_master_status_perusahaan')->nullable()->references('kode')->on('tbl_master_status_perusahaan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_history_registrasi_vendor', function (Blueprint $table) {
            $table->dropForeign(['kode_master_status_perusahaan']);
			$table->dropColumn('kode_master_status_perusahaan');
        });
    }
};
