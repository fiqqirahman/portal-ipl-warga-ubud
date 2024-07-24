<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Services\Clients\SSOClient;
use App\Models\User;

class UpdateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $ssoClient = new SSOClient();
		
        foreach ($users as $user) {
            $data = $ssoClient->getUserByNRIK($user->nrik);

            if ($data['status']) {
                foreach ($data['result'] as $v) {
                    $user->update([
                        'sso_user_id' => $v['id'] ?? 0,
                        'id_peg' => $v['id_peg'] ?? 0,
                        'id_unit_kerja' => $v['id_unit_kerja'] ?? 0,
                        'id_jabatan' => $v['id_jabatan'] ?? 0,
                        'id_tingkatan' => $v['id_tingkatan'] ?? 0,
                        'id_departemen' => $v['id_departemen'] ?? 0,
                        'id_divisi' => $v['id_divisi'] ?? 0,
                    ]);
                }
            }
        }
    }
}
