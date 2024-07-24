<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
			// Get from Service Go
	        DailyDepartemenSeeder::class,
	        DailyDivisiSeeder::class,
	        DailyUnitKerjaSeeder::class,
	        DailyTingkatanSeeder::class,
	        DailyJabatanSeeder::class,
	        
	        // Get from Service Go
	        UserSeeder::class,
			
	        // Get from Service Go
	        UpdateUserSeeder::class,
			
			// Spatie Permission, Role and Menu
	        RoleSeeder::class,
	        
	        // Another Seeders here
        ]);
    }
}
