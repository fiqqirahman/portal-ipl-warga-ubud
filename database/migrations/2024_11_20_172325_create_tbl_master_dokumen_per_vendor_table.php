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
        Schema::create('tbl_master_dokumen_per_vendor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_history_registrasi_vendor')->references('id')
                ->on('tbl_history_registrasi_vendor')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_master_dokumen')->references('id')
                ->on('tbl_master_dokumen')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nama_dokumen');
            $table->string('keterangan_dokumen')->nullable();
            $table->json('additional_info')->nullable();
            $table->string('path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_master_dokumen_per_vendor');
    }
};
