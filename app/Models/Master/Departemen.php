<?php

namespace App\Models\Master;

use App\Traits\Model\Scope\IsActive;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * 
 *
 * @method static Builder|Departemen isActive(bool $boolean = true, string $orderBy = 'id', string $direction = 'ASC')
 * @method static Builder|Departemen newModelQuery()
 * @method static Builder|Departemen newQuery()
 * @method static Builder|Departemen query()
 * @property int $id
 * @property int $id_departemen
 * @property string $nama_departemen
 * @property int $status_data
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Departemen whereCreatedAt($value)
 * @method static Builder|Departemen whereId($value)
 * @method static Builder|Departemen whereIdDepartemen($value)
 * @method static Builder|Departemen whereNamaDepartemen($value)
 * @method static Builder|Departemen whereStatusData($value)
 * @method static Builder|Departemen whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Departemen extends Model
{
    use IsActive;

    protected $table = 'tbl_master_departemen';

    protected $guarded = ['id'];
}
