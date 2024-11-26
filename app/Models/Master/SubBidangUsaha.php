<?php

namespace App\Models\Master;

use App\Models\RegistrasiVendor;
use App\Models\User;
use App\Traits\Model\Scope\IsActive;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create(array $param)
 * @method static find(string $id)
 */
class SubBidangUsaha extends Model
{
    use IsActive;

    protected $table = 'tbl_master_sub_bidang_usaha';

    protected $guarded = ['id'];
    public function masterSubBidangUsaha(): BelongsTo
    {
        return $this->belongsTo(RegistrasiVendor::class, 'kode_master_sub_bidang_usaha');
    }
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
