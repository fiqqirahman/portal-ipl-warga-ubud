<?php

namespace App\Models\Master;

use App\Traits\Model\Scope\IsActive;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DokumenVendor extends Model
{
    use IsActive;

    protected $table = 'tbl_master_dokumen_per_vendor';

    protected $guarded = ['id'];
	
	protected function additionalInfo(): Attribute
	{
		return Attribute::make(
			get: fn ($value) => json_decode($value)
		);
	}
	
	public function document(): BelongsTo
	{
		return $this->belongsTo(Dokumen::class, 'id_master_dokumen', 'id');
	}
}
