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
 * @method static Builder|Jabatan isActive(bool $boolean = true, string $orderBy = 'id', string $direction = 'ASC')
 * @method static Builder|Jabatan newModelQuery()
 * @method static Builder|Jabatan newQuery()
 * @method static Builder|Jabatan query()
 * @property int $id
 * @property int $id_jabatan
 * @property string $nama_jabatan
 * @property int $status_data
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Jabatan whereCreatedAt($value)
 * @method static Builder|Jabatan whereId($value)
 * @method static Builder|Jabatan whereIdJabatan($value)
 * @method static Builder|Jabatan whereNamaJabatan($value)
 * @method static Builder|Jabatan whereStatusData($value)
 * @method static Builder|Jabatan whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Jabatan extends Model
{
    use IsActive;

    protected $table = 'tbl_master_jabatan';

    protected $guarded = ['id'];
}
