<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Services\Clients\SSOClient;
use App\Models\Master\Departemen;

class DailyDepartemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ssoClient = new SSOClient();
        $data = $ssoClient->getDepartemen();
        $newData = [];
        if ($data['status']) {
            foreach ($data['result'] as $v) {
                $newData[] = ['id_departemen' => $v['id_departemen'] ?? 0, 'nama_departemen' => $v['nama_departemen'] ?? '', 'status_data' => $v['status_data'] ?? 0];
            }
        }
        Departemen::upsert($newData, ['id_departemen'], ['nama_departemen', 'status_data']);
    }
}
