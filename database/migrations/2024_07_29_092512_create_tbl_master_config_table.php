<?php
	
use App\Helpers\CacheForeverHelper;
use App\Models\Utility\MasterConfig;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMasterConfigTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 * @throws Exception
	 */
    public function up(): void
    {
        Schema::create('tbl_master_config', function (Blueprint $table) {
            $table->id();
			$table->string('key', 255)->unique();
			$table->text('value');
			$table->text('description');
			$table->enum('type', ['number','text','richtext','boolean','color','email']);
			$table->boolean('is_private')->default(false);
            $table->timestamps();
        });
	    
		// Seed Data Master Config
	    (new \Database\Seeders\MasterConfigSeeder())->run();
	 
		// Store MasterConfig to Cache
	    CacheForeverHelper::syncMasterConfig();
    }
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 * @throws Exception
	 */
    public function down(): void
    {
        Schema::dropIfExists('tbl_master_config');
		
		// Remove Cache
        CacheForeverHelper::destroy('master_config');
    }
}
