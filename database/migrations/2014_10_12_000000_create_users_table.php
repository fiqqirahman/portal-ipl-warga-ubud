<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
	        $table->id();
	        $table->text('sso_user_id')->nullable()->unique();
	        $table->integer('id_peg')->unique();
	        $table->string('name');
	        $table->string('nrik')->unique();
	        $table->string('username')->unique();
	        $table->string('email')->unique();
	        $table->date('tanggal_lahir')->nullable();
	        $table->text('foto')->nullable();
	        $table->integer('id_departemen')->nullable();
	        $table->foreignId('id_tingkatan')->references('id_tingkatan')->on('tbl_master_tingkatan');
	        $table->integer('id_jabatan')->nullable();
	        $table->foreignId('id_unit_kerja')->references('id_unit_kerja')->on('tbl_master_unit_kerja');
	        $table->integer('id_divisi')->nullable();
	        $table->boolean('status_data')->default(true);
	        $table->smallInteger('is_blokir')->nullable();
	        $table->string('ip_address')->nullable();
	        $table->text('session_id')->nullable();
	        $table->timestamp('last_seen')->nullable();
	        $table->dateTime('last_activity')->nullable();
	        $table->date('expired_password')->nullable()->default('1970-01-01');
	        $table->rememberToken();
	        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}
