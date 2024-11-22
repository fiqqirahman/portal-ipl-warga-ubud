<?php

namespace App\Models;

use App\Models\Master\UnitKerja;
use App\Traits\Model\Scope\IsActive;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Spatie\Permission\Traits\HasRoles;

/**
 * 
 *
 * @property-read HistoryFile|null $foto
 * @property-read DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read UnitKerja|null $unitKerja
 * @property-read User|null $updater
 * @method static Builder|User filter(array $filters)
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User permission($permissions, $without = false)
 * @method static Builder|User query()
 * @method static Builder|User role($roles, $guard = null, $without = false)
 * @method static Builder|User searchByName(array $filters)
 * @method static Builder|User withoutPermission($permissions)
 * @method static Builder|User withoutRole($roles, $guard = null)
 * @method static Builder|User isActive(bool $boolean = TRUE, string $orderBy = 'id', string $direction = 'ASC')
 * @property int $id
 * @property string|null $sso_user_id
 * @property int $id_peg
 * @property string $name
 * @property string $nrik
 * @property string $username
 * @property string $email
 * @property string|null $tanggal_lahir
 * @property int|null $id_departemen
 * @property int $id_tingkatan
 * @property int|null $id_jabatan
 * @property int $id_unit_kerja
 * @property int|null $id_divisi
 * @property bool $status_data
 * @property int|null $is_blokir
 * @property string|null $ip_address
 * @property string|null $session_id
 * @property string|null $last_seen
 * @property string|null $last_activity
 * @property string|null $expired_password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $id_file_foto
 * @property mixed $is_activated
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereExpiredPassword($value)
 * @method static Builder|User whereFoto($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereIdDepartemen($value)
 * @method static Builder|User whereIdDivisi($value)
 * @method static Builder|User whereIdFileFoto($value)
 * @method static Builder|User whereIdJabatan($value)
 * @method static Builder|User whereIdPeg($value)
 * @method static Builder|User whereIdTingkatan($value)
 * @method static Builder|User whereIdUnitKerja($value)
 * @method static Builder|User whereIpAddress($value)
 * @method static Builder|User whereIsBlokir($value)
 * @method static Builder|User whereLastActivity($value)
 * @method static Builder|User whereLastSeen($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User whereNrik($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereSessionId($value)
 * @method static Builder|User whereSsoUserId($value)
 * @method static Builder|User whereStatusData($value)
 * @method static Builder|User whereTanggalLahir($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @method static Builder|User whereUsername($value)
 * @mixin Eloquent
 */
class User extends Authenticatable
{
    use Notifiable, HasRoles, IsActive;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function unitKerja(): BelongsTo
    {
        return $this->belongsTo(UnitKerja::class, 'id_unit_kerja', 'id_unit_kerja');
    }

    function foto(): BelongsTo
    {
        return $this->belongsTo(HistoryFile::class, 'id_file_foto');
    }

    function updater(): BelongsTo
    {
        return $this->belongsTo(self::class, 'updated_by');
    }

    function scopeSearchByName($query, array $filters): void
    {
        $query->when($filters['nama'] ?? false, function ($query, $nama) {
            return $query->where('name', 'ILIKE', '%' . $nama . '%');
        });
    }

    function scopeFilter($query, array $filters): void
    {
        $query->when($filters['role'] ?? false, function ($query, $role) {
            return $query->whereHas('roles', function (Builder $query) use ($role) {
                $query->where('name', $role);
            });
        })->when($filters['status_blokir'] ?? false, function ($query, $status) {
            return $query->where('is_blokir', $status);
        });
    }
}
