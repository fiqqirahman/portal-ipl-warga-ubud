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
            ],
	        [
		        'key' => MasterConfigKeyEnum::StyleIsLayoutFullWidth->value,
		        'value' => '0',
		        'description' => 'Apakah lebar Layout full width atau tidak',
		        'type' => MasterConfigTypeEnum::Boolean,
		        'is_private' => false
	        ]
        ];
		
        collect($collections)->each(function ($data) {
            MasterConfig::firstOrCreate(['key' => $data['key']], $data);
        });
    }
}
