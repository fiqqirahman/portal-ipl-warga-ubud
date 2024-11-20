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
            $table->text('nama')->nullable();
            $table->string('nama_singkatan')->nullable();
            $table->string('npwp')->nullable();
            $table->string('kode_jenis_vendor')->nullable();
            $table->string('kode_kategori_vendor')->nullable();
            $table->string('kode_bentuk_badan_usaha')->nullable();
            $table->string('kode_status_perusahaan')->nullable();
            $table->text('alamat')->nullable();
            $table->string('kode_negara')->nullable();
            $table->bigInteger('kode_provinsi')->nullable();
            $table->foreignId('kode_kab_kota')->nullable()->references('kode')->on('tbl_master_provinsi');
            $table->foreignId('kode_kecamatan')->nullable()->references('kode')->on('tbl_master_kab_kota');
            $table->foreignId('kode_kelurahan')->nullable()->references('kode')->on('tbl_master_kecamatan');
            $table->string('kode_pos')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('no_fax')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('no_identitas')->nullable();
            $table->date('tanggal_berakhir')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('kode_divisi_vendor')->nullable();
            $table->foreignId('file_id')->nullable()->references('id')->on('tbl_history_file');
            $table->foreignId('kode_status_approval')->nullable();
            $table->string('nama_pic')->nullable();
            $table->string('no_hp_pic')->nullable();
            $table->string('email_pic')->nullable();
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
