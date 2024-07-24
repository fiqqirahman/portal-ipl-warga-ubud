<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMasterUnitKerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_master_unit_kerja', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_unit_kerja')->unique();
            $table->string('nama');
            $table->smallInteger('status_data')->default(1);
	        $table->string('kode_branch_induk')->nullable();
	        $table->string('kode_branch')->nullable();
	        $table->string('kategori_unit_kerja')->nullable(); //1:GRUP, 2:CABANG, 3:CAPEM
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_master_unit_kerja');
    }
}
