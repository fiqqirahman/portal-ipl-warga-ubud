<?php

namespace App\Models\Master;

use App\Models\RegistrasiVendor;
use App\Traits\Model\Scope\IsActive;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JenisIdentitas extends Model
{
    use IsActive;
    protected $table = 'tbl_master_jenis_identitas';

    protected $guarded = ['id'];
    public function masterJenisIdentitas(): BelongsTo
    {
        return $this->belongsTo(RegistrasiVendor::class, 'kode_master_jenis_identitas');
    }
}
