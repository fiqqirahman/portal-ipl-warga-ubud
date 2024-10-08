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
        Schema::create('tbl_master_kab_kota', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kode')->unique();
            $table->string('nama');
            $table->foreignId('kode_provinsi')->references('kode')->on('tbl_master_provinsi');
            $table->smallInteger('status_data')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_master_kab_kota');
    }
};
