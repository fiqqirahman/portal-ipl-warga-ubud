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
	        
			// Master Config Seeder
	        MasterConfigSeeder::class,
	        
	        // Master Data Seeder
            JenisVendorSeeder::class,
            BentukBadanUsahaSeeder::class,
            StatusPerusahaanSeeder::class,
            KategoriVendorSeeder::class,
            ProvinsiSeeder::class,
            KabKotaSeeder::class,
            KecamatanSeeder::class,
            KelurahanSeeder::class,
            MasterDokumenSeeder::class,
        ]);
    }
}
