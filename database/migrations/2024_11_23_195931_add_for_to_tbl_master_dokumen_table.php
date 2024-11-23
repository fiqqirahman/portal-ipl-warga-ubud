<?php

use App\Enums\DocumentForEnum;
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
        Schema::table('tbl_master_dokumen', function (Blueprint $table) {
            $table->enum('for', DocumentForEnum::getAll())->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_master_dokumen', function (Blueprint $table) {
	        $table->dropColumn('for');
        });
    }
};
