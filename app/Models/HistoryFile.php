<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * 
 *
 * @method static Builder|HistoryFile newModelQuery()
 * @method static Builder|HistoryFile newQuery()
 * @method static Builder|HistoryFile onlyTrashed()
 * @method static Builder|HistoryFile query()
 * @method static Builder|HistoryFile withTrashed()
 * @method static Builder|HistoryFile withoutTrashed()
 * @property int $id
 * @property string $kode_file
 * @property string $path_file
 * @property string $keterangan
 * @property int $status_upload
 * @property int $created_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @method static Builder|HistoryFile whereCreatedAt($value)
 * @method static Builder|HistoryFile whereCreatedBy($value)
 * @method static Builder|HistoryFile whereDeletedAt($value)
 * @method static Builder|HistoryFile whereId($value)
 * @method static Builder|HistoryFile whereKeterangan($value)
 * @method static Builder|HistoryFile whereKodeFile($value)
 * @method static Builder|HistoryFile wherePathFile($value)
 * @method static Builder|HistoryFile whereStatusUpload($value)
 * @method static Builder|HistoryFile whereUpdatedAt($value)
 * @mixin Eloquent
 */
class HistoryFile extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_history_file';

    protected $guarded = ['id'];

    // status_upload
    // 0 = sedang upload
    // 1 = berhasil upload
    // 99 = gagal upload
}
