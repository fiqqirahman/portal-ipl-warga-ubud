<?php

use App\Enums\StatusPembayaranIPLEnum;
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
        Schema::create('tbl_history_ipl_payments', function (Blueprint $table) {
            $table->id();
            $table->string('amount');
            $table->string('method');
            $table->string('periode');
            $table->enum('status', StatusPembayaranIPLEnum::getAll())->default(StatusPembayaranIPLEnum::Pending); // pending, checked, approved, rejected
            $table->string('proof')->nullable();
            $table->text('rejection_reason')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('checked_by')->nullable();
            $table->timestamp('checked_at')->nullable();
            $table->integer('approved_by')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_history_ipl_payments');
    }
};
