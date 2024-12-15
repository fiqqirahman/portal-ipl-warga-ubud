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
        Schema::create('tbl_history_ipl_payments_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ipl_payment_id');
            $table->unsignedBigInteger('checked_by')->nullable();
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->text('log_details');
            $table->timestamps();

            $table->foreign('ipl_payment_id')->references('id')->on('tbl_history_ipl_payments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_history_ipl_payments_logs');
    }
};
