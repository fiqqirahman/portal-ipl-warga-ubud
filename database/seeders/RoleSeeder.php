<?php

namespace Database\Seeders;

use App\Enums\PermissionEnum;
use App\Models\Menu;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Statics\User\Role as StaticRole;
use App\Statics\User\Menu as StaticMenu;
use App\Statics\User\NRIK as StaticNRIK;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
		
        // Create permissions
        $permissions = PermissionEnum::getAll(true);

        collect($permissions)->each(function ($data) {
            Permission::updateOrCreate(['name' => $data['name']],$data);
        });

        // Create menus
        $menus = [
            ['id' => StaticMenu::$DASHBOARD, 'name' => 'Dashboard', 'route' => 'index', 'icon' => 'fa-dashboard', 'parent_id' => 0, 'order' => 1],

//            ['id' => StaticMenu::$MASTER_DATA, 'name' => 'Master Data', 'route' => 'index', 'icon' => 'fa-dashboard', 'parent_id' => 0, 'order' => 2],
//            ['id' => StaticMenu::$MASTER_JENIS_VENDOR, 'name' => 'Master Jenis Vendor', 'route' => 'master.jenis-vendor.index', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$MASTER_DATA, 'order' => 1],
//            ['id' => StaticMenu::$MASTER_BENTUK_BADAN_USAHA, 'name' => 'Master Bentuk Badan Usaha', 'route' => 'master.bentuk-badan-usaha.index', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$MASTER_DATA, 'order' => 2],
//            ['id' => StaticMenu::$MASTER_STATUS_PERUSAHAAN, 'name' => 'Master Status Perusahaan', 'route' => 'master.status-perusahaan.index', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$MASTER_DATA, 'order' => 3],
//            ['id' => StaticMenu::$MASTER_KATEGORI_VENDOR, 'name' => 'Master Kategori Vendor', 'route' => 'master.kategori-vendor.index', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$MASTER_DATA, 'order' => 4],
//            ['id' => StaticMenu::$MASTER_DOKUMEN, 'name' => 'Master Dokumen', 'route' => 'master.dokumen.index', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$MASTER_DATA, 'order' => 5],
//            ['id' => StaticMenu::$MASTER_BANK, 'name' => 'Master Bank', 'route' => 'master.bank.index', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$MASTER_DATA, 'order' => 6],
//            ['id' => StaticMenu::$MASTER_SUB_BIDANG_USAHA, 'name' => 'Master Sub Bidang Usaha', 'route' => 'master.sub-bidang-usaha.index', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$MASTER_DATA, 'order' => 7],
//            ['id' => StaticMenu::$MASTER_KUALIFIKASI_GRADE, 'name' => 'Master Kualifikasi Grade', 'route' => 'master.kualifikasi-grade.index', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$MASTER_DATA, 'order' => 8],
//            ['id' => StaticMenu::$MASTER_JENIS_IDENTITAS, 'name' => 'Master Jenis Identitas', 'route' => 'master.jenis-identitas.index', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$MASTER_DATA, 'order' => 9],
//            ['id' => StaticMenu::$MASTER_JABATAN_VENDOR, 'name' => 'Master Jabatan Vendor', 'route' => 'master.jabatan-vendor.index', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$MASTER_DATA, 'order' => 10],
//            ['id' => StaticMenu::$MASTER_JENIS_INVENTARIS, 'name' => 'Master Jenis Inventaris', 'route' => 'master.jenis-invetaris.index', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$MASTER_DATA, 'order' => 11],
//            ['id' => StaticMenu::$MASTER_JENIS_MERK_INVENTARIS, 'name' => 'Master Jenis Merk Inventaris', 'route' => 'master.jenis-merk-inventaris.index', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$MASTER_DATA, 'order' => 12],

//            ['id' => StaticMenu::$REGISTRASI_VENDOR, 'name' => 'Registrasi Vendor', 'route' => 'index', 'icon' => 'fa-dashboard', 'parent_id' => 0, 'order' => 3],
//            ['id' => StaticMenu::$VENDOR_PERUSAHAAN, 'name' => 'Vendor Perusahaan', 'route' => 'menu.registrasi-vendor-perusahaan.index', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$REGISTRASI_VENDOR, 'order' => 1],
//            ['id' => StaticMenu::$VENDOR_PERORANGAN, 'name' => 'Vendor Perorangan', 'route' => 'menu.registrasi-vendor.index', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$REGISTRASI_VENDOR, 'order' => 2],
//            ['id' => StaticMenu::$APPROVAL_REGISTRASI_VENDOR, 'name' => 'Approval', 'route' => 'menu.operator.registrasi-vendor.index', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$REGISTRASI_VENDOR, 'order' => 3],

            ['id' => StaticMenu::$MENU_IPL, 'name' => 'Menu', 'route' => 'index', 'icon' => 'fa-dashboard', 'parent_id' => 0, 'order' => 2],
            ['id' => StaticMenu::$PEMBAYARAN_IPL, 'name' => 'Pembayaran IPL', 'route' => 'menu.pembayaran-ipl.index', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$MENU_IPL, 'order' => 1],
            ['id' => StaticMenu::$APPROVAL_PEMBAYARAN_IPL, 'name' => 'Approval Pembayaran IPL', 'route' => 'index', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$MENU_IPL, 'order' => 2],

            ['id' => StaticMenu::$UTILITY, 'name' => 'Utility', 'route' => 'index', 'icon' => 'fa-dashboard', 'parent_id' => 0, 'order' => 99999],
	        ['id' => StaticMenu::$DEBUG_EAGLE_EYE, 'name' => 'Debug', 'route' => 'telescope', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$UTILITY, 'order' => 1],
	        ['id' => StaticMenu::$MASTER_CONFIG, 'name' => 'Master Config', 'route' => 'utility.master-config.index', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$UTILITY, 'order' => 2],
        ];

        collect($menus)->each(function ($data) {
            Menu::query()->updateOrCreate(['id' => $data['id']],$data);
        });

        // Create roles
        $roles = StaticRole::getAllForCreate();
        foreach ($roles as $role) {
            $roleDb = Role::updateOrCreate(['id' => $role['id']],['id' => $role['id'], 'name' => $role['name']]);
            $roleDb->givePermissionTo($role['permissions']);
            $roleDb->menus()->sync($role['menus']);
        }

        // Assign users to roles
        $user_nriks = StaticNRIK::getAllForCreate();
        foreach ($user_nriks as $nrik) {
            $user = User::where('nrik', $nrik['nrik'])->first();
	        $user?->assignRole($nrik['roles']);
        }
    }
}
