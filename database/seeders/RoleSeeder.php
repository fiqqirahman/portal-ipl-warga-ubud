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
        $permissions = [
            // ['name' => PermissionEnum::SomeMenuAccess->value],
	        
            ['name' => PermissionEnum::UtilityAccess->value],
            ['name' => PermissionEnum::DebugEagleEyeAccess->value],
            ['name' => PermissionEnum::MasterConfigAccess->value],

            //MasterJenisVendor
            ['name' => PermissionEnum::MasterJenisVendorAccess->value],
            ['name' => PermissionEnum::MasterJenisVendorCreate->value],
            ['name' => PermissionEnum::MasterJenisVendorEdit->value],

            //master bentuk badan usaha
            ['name' => PermissionEnum::MasterBentukBadanUsahaAccess->value],
            ['name' => PermissionEnum::MasterBentukBadanUsahaCreate->value],
            ['name' => PermissionEnum::MasterBentukBadanUsahaEdit->value],

            //master kategori vendor
            ['name' => PermissionEnum::MasterKategoriVendorAccess->value],
            ['name' => PermissionEnum::MasterKategoriVendorCreate->value],
            ['name' => PermissionEnum::MasterKategoriVendorEdit->value],

            //master status perusahaan
            ['name' => PermissionEnum::MasterStatusPerusahaanAccess->value],
            ['name' => PermissionEnum::MasterStatusPerusahaanCreate->value],
            ['name' => PermissionEnum::MasterStatusPerusahaanEdit->value],

            //master status Dokumen
            ['name' => PermissionEnum::MasterDokumenAccess->value],
            ['name' => PermissionEnum::MasterDokumenCreate->value],
            ['name' => PermissionEnum::MasterDokumenEdit->value],

            //registrasi vendor
            ['name' => PermissionEnum::RegistrasiVendorAccess->value],
            ['name' => PermissionEnum::RegistrasiVendorCreate->value],
            ['name' => PermissionEnum::RegistrasiVendorEdit->value],

            //registrasi vendor perusahaan
            ['name' => PermissionEnum::RegistrasiVendorPerusahaanAccess->value],
            ['name' => PermissionEnum::RegistrasiVendorPerusahaanCreate->value],
            ['name' => PermissionEnum::RegistrasiVendorPerusahaanEdit->value],
        ];

        collect($permissions)->each(function ($data) {
            Permission::updateOrCreate(['name' => $data['name']],$data);
        });

        // Create menus
        $menus = [
            ['id' => StaticMenu::$DASHBOARD, 'name' => 'Dashboard', 'route' => 'index', 'icon' => 'fa-dashboard', 'parent_id' => 0, 'order' => 1],

            ['id' => StaticMenu::$MASTER_DATA, 'name' => 'Master Data', 'route' => 'index', 'icon' => 'fa-dashboard', 'parent_id' => 0, 'order' => 2],
            ['id' => StaticMenu::$MASTER_JENIS_VENDOR, 'name' => 'Master Jenis Vendor', 'route' => 'master.jenis-vendor.index', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$MASTER_DATA, 'order' => 1],
            ['id' => StaticMenu::$MASTER_BENTUK_BADAN_USAHA, 'name' => 'Master Bentuk Badan Usaha', 'route' => 'master.bentuk-badan-usaha.index', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$MASTER_DATA, 'order' => 2],
            ['id' => StaticMenu::$MASTER_STATUS_PERUSAHAAN, 'name' => 'Master Status Perusahaan', 'route' => 'master.status-perusahaan.index', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$MASTER_DATA, 'order' => 3],
            ['id' => StaticMenu::$MASTER_KATEGORI_VENDOR, 'name' => 'Master Kategori Vendor', 'route' => 'master.kategori-vendor.index', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$MASTER_DATA, 'order' => 4],
            ['id' => StaticMenu::$MASTER_DOKUMEN, 'name' => 'Master Dokumen', 'route' => 'index', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$MASTER_DATA, 'order' => 5],

            ['id' => StaticMenu::$REGISTRASI_VENDOR, 'name' => 'Registrasi Vendor', 'route' => 'index', 'icon' => 'fa-dashboard', 'parent_id' => 0, 'order' => 3],
            ['id' => StaticMenu::$VENDOR_PERUSAHAAN, 'name' => 'Vendor Perusahaan', 'route' => 'menu.registrasi-vendor-perusahaan.index', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$REGISTRASI_VENDOR, 'order' => 1],
            ['id' => StaticMenu::$VENDOR_PERORANGAN, 'name' => 'Vendor Perorangan', 'route' => 'menu.registrasi-vendor.index', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$REGISTRASI_VENDOR, 'order' => 2],

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
