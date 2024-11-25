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
        Schema::create('tbl_history_pengalaman_pekerjaan_vendor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_history_registrasi_vendor')->references('id')->on('tbl_history_registrasi_vendor');
            $table->enum('kodefikasi_tab', ['Pengalaman Pekerjaan 3 Tahun Terakhir','Mitra Usaha','Pekerjaan Berjalan']);
            $table->string('nama_mitra')->nullable();
            $table->string('nama_pekerjaan');
            $table->foreignId('lokasi_pekerjaan')->references('kode')->on('tbl_master_provinsi');
            $table->string('pemberi_pekerjaan');
            $table->foreignId('kode_jenis_pekerjaan')->references('kode')->on('tbl_master_jenis_vendor');
            $table->string('no_telfon_perusahaan_atau_pic');
            $table->foreignId('kode_bidang_usaha')->references('kode')->on('tbl_master_bentuk_badan_usaha');
            $table->date('tanggal_mulai_kerjasama');
            $table->string('no_kontrak');
            $table->date('tanggal_kontrak');
            $table->string('nilai_kontrak');
            $table->foreignId('created_by')->references('id')->on('users');
            $table->foreignId('updated_by')->nullable()->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_master_pengalaman_pekerjaan_vendor');
    }
};
