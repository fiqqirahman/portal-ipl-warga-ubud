<?php

namespace App\Models;

use App\Enums\StatusRegistrasiEnum;
use App\Enums\UserVendorTypeEnum;
use App\Models\Master\DokumenVendor;
use App\Models\Master\PengalamanPekerjaanVendor;
use App\Traits\HasDocuments;
use App\Traits\Model\Scope\IsActive;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RegistrasiVendor extends Model
{
    use IsActive, HasDocuments;

    protected $table = 'tbl_history_registrasi_vendor';

    protected $guarded = ['id'];
	
	public function resolveRouteBinding($value, $field = null)
	{
		try {
			return $this->where($field ?? $this->getRouteKeyName(), dekrip($value))->firstOrFail();
		} catch (Exception $exception) {
			abort(404);
		}
	}
	
	protected function casts(): array
	{
		return [
			'status_registrasi' => StatusRegistrasiEnum::class,
		];
	}

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
	
	public function documents(): HasMany
	{
		return $this->hasMany(DokumenVendor::class, 'id_history_registrasi_vendor', 'id');
	}
    public function pengalamanPekerjaan(): HasMany
    {
        return $this->hasMany(PengalamanPekerjaanVendor::class, 'id_history_registrasi_vendor', 'id');
    }
}
