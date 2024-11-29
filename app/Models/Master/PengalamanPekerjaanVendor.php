<?php

namespace App\Models\Master;

use App\Enums\KodefikasiTabEnum;
use App\Models\RegistrasiVendor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PengalamanPekerjaanVendor extends Model
{
    protected $table = 'tbl_history_pengalaman_pekerjaan_vendor';

    protected $guarded = ['id'];
	
	protected function casts(): array
	{
		return [
			'kodefikasi_tab' => KodefikasiTabEnum::class,
		];
	}
	
    public function registrasiVendor(): BelongsTo
    {
        return $this->belongsTo(RegistrasiVendor::class, 'id_history_registrasi_vendor');
    }
}
