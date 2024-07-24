<?php

namespace Database\Seeders;

use App\Services\Clients\SSOClient;
use App\Models\Master\Tingkatan;
use Illuminate\Database\Seeder;

class DailyTingkatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ssoClient = new SSOClient();
        $data = $ssoClient->getTingkatan();
        $newData = [];
        if ($data['status']) {
            foreach ($data['result'] as $v) {
                $newData[] = ['id_tingkatan' => $v['id_tingkatan'] ?? 0, 'nama_tingkatan' => $v['nama_tingkatan'] ?? '', 'status_data' => $v['status_data'] ?? 0];
            }
        }
        Tingkatan::upsert($newData, ['id_tingkatan'], ['nama_tingkatan', 'status_data']);
    }
}
