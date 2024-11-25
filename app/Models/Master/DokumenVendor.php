<?php

namespace App\Models\Master;

use App\Models\RegistrasiVendor;
use App\Traits\Model\Scope\IsActive;
use Exception;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DokumenVendor extends Model
{
    use IsActive;

    protected $table = 'tbl_master_dokumen_per_vendor';

    protected $guarded = ['id'];
	
	public function resolveRouteBinding($value, $field = null)
	{
		try {
			return $this->where($field ?? $this->getRouteKeyName(), dekrip($value))->firstOrFail();
		} catch (Exception $exception) {
			abort(404);
		}
	}
	
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
	
	public function vendor(): BelongsTo
	{
		return $this->belongsTo(RegistrasiVendor::class, 'id_history_registrasi_vendor', 'id');
	}
}
