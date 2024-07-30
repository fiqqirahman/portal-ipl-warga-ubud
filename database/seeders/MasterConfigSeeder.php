<?php

namespace Database\Seeders;

use App\Enums\MasterConfigKeyEnum;
use App\Enums\MasterConfigTypeEnum;
use App\Models\Utility\MasterConfig;
use Illuminate\Database\Seeder;

class MasterConfigSeeder extends Seeder
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
				'key' => MasterConfigKeyEnum::SecuritySessionLifetime->value,
	            'value' => '120',
	            'description' => 'Session Timeout. Lamanya durasi sebuah session (*dalam menit)',
		        'type' => MasterConfigTypeEnum::Number,
		        'is_private' => true
            ]
        ];
		
        collect($collections)->each(function ($data) {
            MasterConfig::updateOrCreate(['key' => $data['key']], $data);
        });
    }
}
