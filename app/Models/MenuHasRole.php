<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * 
 *
 * @method static Builder|MenuHasRole newModelQuery()
 * @method static Builder|MenuHasRole newQuery()
 * @method static Builder|MenuHasRole query()
 * @property int $menu_id
 * @property int $role_id
 * @method static Builder|MenuHasRole whereMenuId($value)
 * @method static Builder|MenuHasRole whereRoleId($value)
 * @mixin Eloquent
 */
class MenuHasRole extends Pivot
{
    protected $table = 'menu_has_role';

    protected $fillable = ['menu_id', 'role_id'];
}
