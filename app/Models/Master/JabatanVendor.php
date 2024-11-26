<?php

namespace App\Models\Master;

use App\Models\RegistrasiVendor;
use App\Models\User;
use App\Traits\Model\Scope\IsActive;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JabatanVendor extends Model
{
    use IsActive;
    protected $table = 'tbl_master_jabatan_vendor';

    protected $guarded = ['id'];
    public function masterJabatanVendor(): BelongsTo
    {
        return $this->belongsTo(RegistrasiVendor::class, 'kode_master_jabatan_vendor');
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
