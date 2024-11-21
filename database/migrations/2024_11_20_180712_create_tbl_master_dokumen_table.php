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
        Schema::create('tbl_master_dokumen', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dokumen');
            $table->string('keterangan')->nullable();
            $table->boolean('is_required')->default(false);
            $table->string('max_file_size');
            $table->json('allowed_file_types')->nullable();
            $table->boolean('status')->default(false);
            $table->foreignId('created_by')->nullable()->references('id')->on('users');
            $table->foreignId('updated_by')->nullable()->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_master_dokumen');
    }
};
