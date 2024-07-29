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
        ];

        collect($permissions)->each(function ($data) {
            Permission::create($data);
        });

        // Create menus
        $menus = [
            ['id' => StaticMenu::$DASHBOARD, 'name' => 'Dashboard', 'route' => 'index', 'icon' => 'fa-dashboard', 'parent_id' => 0, 'order' => 1],
	        
	        // ['id' => StaticMenu::$PARENT_X, 'name' => 'Parent X', 'route' => 'prefix.parent.x', 'icon' => 'fa-dashboard', 'parent_id' => 0, 'order' => 2],
	        // ['id' => StaticMenu::$CHILD_1, 'name' => 'Child 1', 'route' => 'prefix.child.1', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$PARENT_X, 'order' => 1],
	        // ['id' => StaticMenu::$CHILD_2, 'name' => 'Child 2', 'route' => 'prefix.child.2', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$PARENT_X, 'order' => 2],

	        // ['id' => StaticMenu::$PARENT_Y, 'name' => 'Parent Y', 'route' => 'prefix.parent.y', 'icon' => 'fa-dashboard', 'parent_id' => 0, 'order' => 3],
	
	        // ['id' => StaticMenu::$PARENT_Z, 'name' => 'Parent Z', 'route' => 'prefix.parent.z', 'icon' => 'fa-dashboard', 'parent_id' => 0, 'order' => 4],
	        
	        ['id' => StaticMenu::$UTILITY, 'name' => 'Utility', 'route' => 'index', 'icon' => 'fa-dashboard', 'parent_id' => 0, 'order' => 99999],
	        ['id' => StaticMenu::$DEBUG_EAGLE_EYE, 'name' => 'Debug', 'route' => 'telescope', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$UTILITY, 'order' => 1],
	        ['id' => StaticMenu::$MASTER_CONFIG, 'name' => 'Master Config', 'route' => 'utility.master-config.index', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$UTILITY, 'order' => 2],
        ];

        collect($menus)->each(function ($data) {
            Menu::query()->create($data);
        });

        // Create roles
        $roles = StaticRole::getAllForCreate();
        foreach ($roles as $role) {
            $roleDb = Role::create(['id' => $role['id'], 'name' => $role['name']]);
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
