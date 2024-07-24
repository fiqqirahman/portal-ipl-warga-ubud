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
 * @method static Builder|Divisi isActive(bool $boolean = true, string $orderBy = 'id', string $direction = 'ASC')
 * @method static Builder|Divisi newModelQuery()
 * @method static Builder|Divisi newQuery()
 * @method static Builder|Divisi query()
 * @property int $id
 * @property int|null $id_divisi
 * @property int|null $unit_kerja_id
 * @property string $nama_divisi
 * @property int $status_data
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Divisi whereCreatedAt($value)
 * @method static Builder|Divisi whereId($value)
 * @method static Builder|Divisi whereIdDivisi($value)
 * @method static Builder|Divisi whereNamaDivisi($value)
 * @method static Builder|Divisi whereStatusData($value)
 * @method static Builder|Divisi whereUnitKerjaId($value)
 * @method static Builder|Divisi whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Divisi extends Model
{
    use IsActive;

    protected $table = 'tbl_master_divisi';

    protected $guarded = ['id'];
}
