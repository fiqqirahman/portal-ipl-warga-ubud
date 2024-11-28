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
        Schema::create('tbl_history_registrasi_vendor', function (Blueprint $table) {
            $table->id();
            $table->string('no_vendor');
            $table->text('nama')->nullable();
            $table->string('nama_singkatan')->nullable();
            $table->string('npwp')->nullable();
            $table->foreignId('kode_master_kategori_vendor')->nullable()->references('kode')->on('tbl_master_kategori_vendor');
            $table->string('no_ktp_perorangan')->nullable();
            $table->foreignId('kode_master_jenis_vendor')->nullable()->references('kode')->on('tbl_master_jenis_vendor');
            $table->foreignId('kode_master_bentuk_badan_usaha')->nullable()->references('kode')->on('tbl_master_bentuk_badan_usaha');
            $table->date('tanggal_berakhir_ktp')->nullable();
            $table->text('alamat')->nullable();
            $table->string('kode_negara')->nullable();
            $table->bigInteger('kode_provinsi')->nullable();
            $table->foreignId('kode_kabupaten_kota')->nullable()->references('kode')->on('tbl_master_provinsi');
            $table->foreignId('kode_kecamatan')->nullable()->references('kode')->on('tbl_master_kab_kota');
            $table->foreignId('kode_kelurahan')->nullable()->references('kode')->on('tbl_master_kecamatan');
            $table->string('kode_pos')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('no_fax')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('nama_pic_perorangan')->nullable();
            $table->string('no_hp_pic_perorangan')->nullable();
            $table->string('email_pic_perorangan')->nullable();
            $table->foreignId('kode_master_nama_bank')->nullable()->references('kode')->on('tbl_master_bank');
            $table->string('nama_cabang_bank')->nullable();
            $table->string('nomor_rekening')->nullable();
            $table->string('nama_nasabah')->nullable();
            $table->string('mata_uang')->nullable();
            $table->foreignId('kode_master_bentuk_badan_usaha_segmentasi')->nullable()->references('kode')->on('tbl_master_bentuk_badan_usaha');
            $table->foreignId('kode_master_kelompok_usaha')->nullable()->references('kode')->on('tbl_master_kelompok_usaha');
            $table->foreignId('kode_master_sub_bidang_usaha')->nullable()->references('kode')->on('tbl_master_sub_bidang_usaha');
            $table->foreignId('kode_master_kualifikasi_grade')->nullable()->references('kode')->on('tbl_master_kualifikasi_grade');
            $table->string('asosiasi')->nullable();
            $table->string('no_sertifikat')->nullable();
            $table->date('masa_berlaku_sertifikat')->nullable();
            $table->date('masa_berakhir_sertifikat')->nullable();
            $table->string('profesi_keahlian')->nullable();
            $table->json('daftar_komisaris')->nullable();
            $table->json('daftar_direksi')->nullable();
            $table->json('pemegang_saham')->nullable();
            $table->json('tenaga_ahli')->nullable();
            $table->json('inventaris')->nullable();
            $table->json('neraca_keuangan')->nullable();
            $table->text('status_registrasi_notes')->nullable();
            $table->foreignId('created_by')->nullable()->references('id')->on('users');
            $table->foreignId('updated_by')->nullable()->references('id')->on('users');
            $table->foreignId('approve_by')->nullable()->references('id')->on('users');
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_history_registrasi_vendor');
    }
};
