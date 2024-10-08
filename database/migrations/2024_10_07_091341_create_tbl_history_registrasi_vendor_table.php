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
            $table->text('nama');
            $table->string('nama_singkatan')->nullable();
            $table->string('npwp');
            $table->string('kode_jenis_vendor');
            $table->string('kode_kategori_vendor');
            $table->string('kode_bentuk_badan_usaha');
            $table->string('kode_status_perusahaan');
            $table->text('alamat');
            $table->string('kode_negara');
            $table->bigInteger('kode_provinsi');
            $table->foreignId('kode_kab_kota')->references('kode')->on('tbl_master_provinsi');
            $table->foreignId('kode_kecamatan')->references('kode')->on('tbl_master_kab_kota');
            $table->foreignId('kode_kelurahan')->references('kode')->on('tbl_master_kecamatan');
            $table->string('kode_pos');
            $table->string('no_telepon');
            $table->string('no_hp');
            $table->string('no_fax');
            $table->string('email');
            $table->string('website')->nullable();
            $table->string('no_identitas');
            $table->date('tanggal_berakhir');
            $table->string('jabatan');
            $table->string('kode_divisi_vendor');
            $table->foreignId('file_id')->references('id')->on('tbl_history_file');
            $table->foreignId('kode_status_approval');
            $table->string('nama_pic');
            $table->string('no_hp_pic');
            $table->string('email_pic');
            $table->foreignId('created_by')->references('id')->on('users');
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
