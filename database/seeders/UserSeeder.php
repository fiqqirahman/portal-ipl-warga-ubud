<?php

namespace Database\Seeders;

use App\Models\User;
use App\Statics\User\Jabatan as StaticJabatan;
use App\Statics\User\NRIK;
use App\Statics\User\Tingkatan as StaticTingkatan;
use Illuminate\Database\Seeder;
use App\Statics\User\UnitKerja as StaticUnitKerja;
use Illuminate\Support\Facades\App;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
	    $collections = [
		    [
			    'id_peg' => 1,
			    'name' => 'Super Admin',
			    'nrik' => NRIK::$SUPER_ADMIN,
			    'username' => 'SA' . NRIK::$SUPER_ADMIN,
			    'email' => 'superadmin@example.com',
			    'tanggal_lahir' => '1999-09-09',
			    'id_jabatan' => StaticJabatan::$PIMPINAN_DIVISI,
			    'id_tingkatan' => StaticTingkatan::$MANAJER,
			    'id_unit_kerja' => StaticUnitKerja::$GRUP_TEKNOLOGI_INFORMASI,
		    ],
	    ];
	    
	    if (App::environment(['local', 'development'])) {
		    $userDeveloper = [
			    [
				    'id_peg' => 2,
				    'name' => 'Developer',
				    'nrik' => NRIK::$DEVELOPER,
				    'username' => 'DE' . NRIK::$DEVELOPER,
				    'email' => 'noncoredev@gmail.com',
				    'tanggal_lahir' => '1999-09-09',
				    'id_jabatan' => StaticJabatan::$ASISTEN_MANAJER,
				    'id_tingkatan' => StaticTingkatan::$ASISTEN_MANAJER,
				    'id_unit_kerja' => StaticUnitKerja::$GRUP_TEKNOLOGI_INFORMASI,
				    'expired_password' => '2030-09-01'
			    ],
			    [
				    'id_peg' => 3,
				    'name' => 'Operator Vendor',
				    'nrik' => NRIK::$RENDY,
				    'username' => 'OV' . NRIK::$RENDY,
				    'email' => 'operator_vendor_bdki@yopmail.com',
				    'tanggal_lahir' => '1999-01-09',
				    'id_jabatan' => StaticJabatan::$ASISTEN_MANAJER,
				    'id_tingkatan' => StaticTingkatan::$ASISTEN_MANAJER,
				    'id_unit_kerja' => StaticUnitKerja::$GRUP_TEKNOLOGI_INFORMASI,
				    'password' => '$2y$10$W.tOb.bMYNlsvX0KaJxBlO.Hf9UUd06ONV3t1v5HpTEJYqRYV7Wvm', // Lenovoa706!
				    'expired_password' => '2030-09-01'
			    ],
		    ];
		    
		    $collections = array_merge($collections, $userDeveloper);
	    }
	    
	    collect($collections)->each(function ($data) {
		    User::query()->updateOrCreate($data);
	    });
    }
}
