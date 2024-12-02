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
        Schema::table('tbl_history_pengalaman_pekerjaan_vendor', function (Blueprint $table) {
	        $table->dropColumn('lokasi_pekerjaan');
        });
		
		Schema::table('tbl_history_pengalaman_pekerjaan_vendor', function (Blueprint $table) {
	        $table->foreignId('lokasi_pekerjaan')->references('kode')->on('tbl_master_kab_kota');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
	    Schema::table('tbl_history_pengalaman_pekerjaan_vendor', function (Blueprint $table) {
		    $table->dropColumn('lokasi_pekerjaan');
	    });
		
        Schema::table('tbl_history_pengalaman_pekerjaan_vendor', function (Blueprint $table) {
	        $table->foreignId('lokasi_pekerjaan')->references('kode')->on('tbl_master_provinsi');
        });
    }
};
