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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('id_peg')->nullable()->change();
            $table->string('nrik')->nullable()->change();
            $table->foreignId('id_tingkatan')->nullable()->change();
            $table->foreignId('id_unit_kerja')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('id_peg')->unique()->change();
            $table->string('nrik')->unique()->change();
            $table->foreignId('id_tingkatan')->nullable()->change();
            $table->foreignId('id_unit_kerja')->nullable()->change();
        });
    }
};
