<?php

namespace App\Services;

use App\Models\Menu;

class MenuService
{
    static function getMenus($parentId = 0, $roles = []): array
    {
        $arrMenu = [];

        $menus = Menu::filterByRoles($parentId, $roles)->orderBy('order')->get();

        if (count($menus) == 0) return [];

        foreach ($menus as $menu) {
			if($menu->id === \App\Statics\User\Menu::$DEBUG_EAGLE_EYE && config('telescope.enabled') !== true){
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
