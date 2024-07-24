<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Services\Clients\SSOClient;
use App\Models\Master\Divisi;

class DailyDivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ssoClient = new SSOClient();
        $data = $ssoClient->getDivisi();
        $newData = [];
        if ($data['status']) {
            foreach ($data['result'] as $v) {
                $newData[] = ['id_divisi' => $v['id_divisi'] ?? 0, 'nama_divisi' => $v['nama_divisi'] ?? '', 'status_data' => $v['status_data'] ?? 0];
            }
        }
        Divisi::upsert($newData, ['id_divisi'], ['nama_divisi', 'status_data']);
    }
}
