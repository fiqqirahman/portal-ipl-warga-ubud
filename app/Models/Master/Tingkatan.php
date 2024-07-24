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
 * @method static Builder|Tingkatan isActive(bool $boolean = true, string $orderBy = 'id', string $direction = 'ASC')
 * @method static Builder|Tingkatan newModelQuery()
 * @method static Builder|Tingkatan newQuery()
 * @method static Builder|Tingkatan query()
 * @property int $id
 * @property int $id_tingkatan
 * @property string $nama_tingkatan
 * @property int $status_data
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Tingkatan whereCreatedAt($value)
 * @method static Builder|Tingkatan whereId($value)
 * @method static Builder|Tingkatan whereIdTingkatan($value)
 * @method static Builder|Tingkatan whereNamaTingkatan($value)
 * @method static Builder|Tingkatan whereStatusData($value)
 * @method static Builder|Tingkatan whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Tingkatan extends Model
{
    use IsActive;

    protected $table = 'tbl_master_tingkatan';

    protected $guarded = ['id'];
}
