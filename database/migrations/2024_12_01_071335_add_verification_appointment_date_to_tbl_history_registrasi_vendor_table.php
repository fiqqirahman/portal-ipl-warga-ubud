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
	        $table->timestamp('appointment_date')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_history_registrasi_vendor', function (Blueprint $table) {
            $table->dropColumn('appointment_date');
        });
    }
};
