<?php

namespace App\Models\Master;

use App\Models\RegistrasiVendor;
use App\Traits\Model\Scope\IsActive;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JabatanVendor extends Model
{
    use IsActive;
    protected $guarded = ['id'];
    public function masterJabatanVendor(): BelongsTo
    {
        return $this->belongsTo(RegistrasiVendor::class, 'kode_master_jabatan_vendor');
    }
}
