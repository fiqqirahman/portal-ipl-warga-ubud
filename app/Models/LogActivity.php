<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * 
 *
 * @property-read User|null $user
 * @method static Builder|LogActivity filter(array $filters)
 * @method static Builder|LogActivity newModelQuery()
 * @method static Builder|LogActivity newQuery()
 * @method static Builder|LogActivity query()
 * @property int $id
 * @property string $ip_access
 * @property int $user_id
 * @property string $activity_content
 * @property string $url
 * @property string $operating_system
 * @property string $device_type
 * @property string $browser_name
 * @property string $method
 * @property string|null $data_before
 * @property string|null $data_after
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|LogActivity whereActivityContent($value)
 * @method static Builder|LogActivity whereBrowserName($value)
 * @method static Builder|LogActivity whereCreatedAt($value)
 * @method static Builder|LogActivity whereDataAfter($value)
 * @method static Builder|LogActivity whereDataBefore($value)
 * @method static Builder|LogActivity whereDeviceType($value)
 * @method static Builder|LogActivity whereId($value)
 * @method static Builder|LogActivity whereIpAccess($value)
 * @method static Builder|LogActivity whereMethod($value)
 * @method static Builder|LogActivity whereOperatingSystem($value)
 * @method static Builder|LogActivity whereUpdatedAt($value)
 * @method static Builder|LogActivity whereUrl($value)
 * @method static Builder|LogActivity whereUserId($value)
 * @mixin Eloquent
 */
class LogActivity extends Model
{
    protected $table = 'users_log_activities';

    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter($query, array $filters): void
    {
        $query->when($filters['user'] ?? false, function ($query, $user) {
            return $query->where('user_id', $user);
        })->when($filters['role'] ?? false, function ($query, $role) {
            return $query->with('user', 'user.roles')->whereHas('user.roles', function (Builder $q) use ($role) {
                $q->where('name', $role);
            });
        })->when($filters['tanggal_akses_awal'] ?? false, function ($query, $tanggalAksesAwal) {
            return $query->where('created_at', '>=', $tanggalAksesAwal.' 00:00:00');
        })->when($filters['tanggal_akses_akhir'] ?? false, function ($query, $tanggalAksesAkhir) {
            return $query->where('created_at', '<=', $tanggalAksesAkhir.' 23:59:59');
        });
    }
}
