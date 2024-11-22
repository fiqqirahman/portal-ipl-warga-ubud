<?php

use App\Enums\UserVendorTypeEnum;
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
            $table->string('activation_token')->nullable();
	        $table->boolean('is_activated')->default(false);
	        $table->boolean('is_vendor_blocked')->default(false);
	        $table->enum('vendor_type', UserVendorTypeEnum::getAll())
		        ->default(UserVendorTypeEnum::Internal);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('activation_token');
            $table->dropColumn('is_activated');
            $table->dropColumn('is_vendor_blocked');
            $table->dropColumn('vendor_type');
        });
    }
};
