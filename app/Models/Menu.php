<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * 
 *
 * @property-read MenuHasRole $pivot
 * @property-read Collection<int, Role> $roles
 * @property-read int|null $roles_count
 * @method static Builder|Menu filterByRoles($parent_id = 0, array $roles = [])
 * @method static Builder|Menu newModelQuery()
 * @method static Builder|Menu newQuery()
 * @method static Builder|Menu onlyTrashed()
 * @method static Builder|Menu query()
 * @method static Builder|Menu withTrashed()
 * @method static Builder|Menu withoutTrashed()
 * @property int $id
 * @property string $name
 * @property string $route
 * @property string $icon
 * @property int $parent_id
 * @property int $order
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @method static Builder|Menu whereCreatedAt($value)
 * @method static Builder|Menu whereDeletedAt($value)
 * @method static Builder|Menu whereIcon($value)
 * @method static Builder|Menu whereId($value)
 * @method static Builder|Menu whereName($value)
 * @method static Builder|Menu whereOrder($value)
 * @method static Builder|Menu whereParentId($value)
 * @method static Builder|Menu whereRoute($value)
 * @method static Builder|Menu whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Menu extends Model
{
    use SoftDeletes;

    protected $table = 'menus';

    public $incrementing = false;

    protected $fillable = ['id', 'name', 'route', 'icon', 'parent_id', 'order'];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'menu_has_role')->using(MenuHasRole::class);
    }

    public function scopeFilterByRoles($query, $parent_id = 0, array $roles = []): void
    {
        $query->with('roles')
            ->where('parent_id', $parent_id)
            ->whereHas('roles', function (Builder $query) use ($roles) {
                $query->whereIn('roles.id', $roles);
            })
            ->orderBy('order');
    }
}
