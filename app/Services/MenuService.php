<?php

namespace App\Services;

use App\Enums\UserVendorTypeEnum;
use App\Models\Menu;
use Auth;

class MenuService
{
    static function getMenus($parentId = 0, $roles = []): array
    {
        $arrMenu = [];

        $menus = Menu::filterByRoles($parentId, $roles)->orderBy('order')->get();

        if (count($menus) == 0) return [];

		$user = Auth::user();
		
        foreach ($menus as $menu) {
			if($menu->id === \App\Statics\User\Menu::$DEBUG_EAGLE_EYE && config('telescope.enabled') !== true){
				continue;
			}
	        
	        if($menu->id === \App\Statics\User\Menu::$VENDOR_PERORANGAN && $user->vendor_type === UserVendorTypeEnum::Company){
		        continue;
	        }
			
			if($menu->id === \App\Statics\User\Menu::$VENDOR_PERUSAHAAN && $user->vendor_type === UserVendorTypeEnum::Individual){
		        continue;
	        }
			
            $childrenMenu = self::getMenus($menu->id, $roles);
            $arrMenu[] = [
                'id' => $menu->id,
                'route' => $menu->route,
                'title' => $menu->name,
                'icon' => $menu->icon,
                'roleNames' => $menu->roles->pluck('name')->toArray(),
                'order' => $menu->order,
                'parent_id' => $menu->parent_id,
                'children' => $childrenMenu,
            ];
        }

        return $arrMenu;
    }
}
