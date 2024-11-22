<?php

use App\Enums\StatusRegistrasiEnum;
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
            $table->enum('status_dokumen', StatusRegistrasiEnum::getAll())
                ->nullable()
                ->default(StatusRegistrasiEnum::Draft);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_history_registrasi_vendor', function (Blueprint $table) {
            //
        });
    }
};
