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
 * @method static Builder|UnitKerja isActive(bool $boolean = true, string $orderBy = 'id', string $direction = 'ASC')
 * @method static Builder|UnitKerja newModelQuery()
 * @method static Builder|UnitKerja newQuery()
 * @method static Builder|UnitKerja query()
 * @property int $id
 * @property int $id_unit_kerja
 * @property string $nama
 * @property int $status_data
 * @property string|null $kode_branch_induk
 * @property string|null $kode_branch
 * @property string|null $kategori_unit_kerja
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|UnitKerja whereCreatedAt($value)
 * @method static Builder|UnitKerja whereId($value)
 * @method static Builder|UnitKerja whereIdUnitKerja($value)
 * @method static Builder|UnitKerja whereKategoriUnitKerja($value)
 * @method static Builder|UnitKerja whereKodeBranch($value)
 * @method static Builder|UnitKerja whereKodeBranchInduk($value)
 * @method static Builder|UnitKerja whereNama($value)
 * @method static Builder|UnitKerja whereStatusData($value)
 * @method static Builder|UnitKerja whereUpdatedAt($value)
 * @mixin Eloquent
 */
class UnitKerja extends Model
{
    use IsActive;

    protected $table = 'tbl_master_unit_kerja';

    protected $guarded = ['id'];
}
