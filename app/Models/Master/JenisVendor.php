<?php

namespace App\Models\Master;

use App\Models\User;
use App\Traits\Model\Scope\IsActive;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create(mixed $param)
 */
class JenisVendor extends Model
{
    use IsActive;

    protected $table = 'tbl_master_jenis_vendor';

    protected $guarded = ['id'];

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    function scopeAktif($query)
    {
        return $query->where('status_data', 1);
    }
}
