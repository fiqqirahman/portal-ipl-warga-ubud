<?php

namespace App\Models;

use App\Enums\StatusRegistrasiEnum;
use App\Models\Master\Bank;
use App\Models\Master\BentukBadanUsaha;
use App\Models\Master\DokumenVendor;
use App\Models\Master\JabatanVendor;
use App\Models\Master\JenisIdentitas;
use App\Models\Master\JenisInventaris;
use App\Models\Master\JenisMerkInventaris;
use App\Models\Master\JenisVendor;
use App\Models\Master\KategoriVendor;
use App\Models\Master\KualifikasiGrade;
use App\Models\Master\Negara;
use App\Models\Master\PengalamanPekerjaanVendor;
use App\Models\Master\StatusPerusahaan;
use App\Models\Master\SubBidangUsaha;
use App\Observers\RegistrasiVendorObserver;
use App\Traits\HasDocuments;
use App\Traits\HasInventaris;
use App\Traits\Model\Scope\IsActive;
use Exception;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[ObservedBy([RegistrasiVendorObserver::class])]
class RegistrasiVendor extends Model
{
    use IsActive, HasDocuments, HasInventaris;

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
	
	protected function daftarKomisaris(): Attribute
	{
		return Attribute::make(
			get: fn ($value) => json_decode($value)
		);
	}
	
	protected function daftarDireksi(): Attribute
	{
		return Attribute::make(
			get: fn ($value) => json_decode($value)
		);
	}
	
	protected function pemegangSaham(): Attribute
	{
		return Attribute::make(
			get: fn ($value) => json_decode($value)
		);
	}
	
	protected function tenagaAhli(): Attribute
	{
		return Attribute::make(
			get: fn ($value) => json_decode($value)
		);
	}
	
	protected function inventaris(): Attribute
	{
		return Attribute::make(
			get: fn ($value) => json_decode($value)
		);
	}
	
	protected function neracaKeuangan(): Attribute
	{
		return Attribute::make(
			get: fn ($value) => json_decode($value)
		);
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
	
	public function kategoriVendor(): BelongsTo
	{
		return $this->belongsTo(KategoriVendor::class, 'kode_master_kategori_vendor','kode');
	}
	
	public function jenisVendor(): BelongsTo
	{
		return $this->belongsTo(JenisVendor::class, 'kode_master_jenis_vendor','kode');
	}
	
	public function bentukBadanUsaha(): BelongsTo
	{
		return $this->belongsTo(BentukBadanUsaha::class, 'kode_master_bentuk_badan_usaha','kode');
	}
	
	public function statusPerusahaan(): BelongsTo
	{
		return $this->belongsTo(StatusPerusahaan::class, 'kode_master_status_perusahaan','kode');
	}
	
	public function negara(): BelongsTo
	{
		return $this->belongsTo(Negara::class, 'kode_master_negara','kode');
	}
	
	public function provinsi(): BelongsTo
	{
		return $this->belongsTo(Provinsi::class, 'kode_master_provinsi','kode');
	}
	
	public function kabupaten(): BelongsTo
	{
		return $this->belongsTo(KabKota::class, 'kode_master_kab_kota','kode');
	}
	
	public function kecamatan(): BelongsTo
	{
		return $this->belongsTo(Kecamatan::class, 'kode_master_kecamatan','kode');
	}
	
	public function kelurahan(): BelongsTo
	{
		return $this->belongsTo(Kelurahan::class, 'kode_master_kelurahan','kode');
	}
	
	public function bank(): BelongsTo
	{
		return $this->belongsTo(Bank::class, 'kode_master_nama_bank','kode');
	}
	
	public function bentukBadanUsahaSegmentasi(): BelongsTo
	{
		return $this->belongsTo(BentukBadanUsaha::class, 'kode_master_bentuk_badan_usaha_segmentasi','kode');
	}
	
	public function kelompokUsahaSegmentasi(): BelongsTo
	{
		return $this->belongsTo(JenisVendor::class, 'kode_master_kelompok_usaha_segmentasi','kode');
	}
	
	public function subBidangUsaha(): BelongsTo
	{
		return $this->belongsTo(SubBidangUsaha::class, 'kode_master_sub_bidang_usaha','kode');
	}
	
	public function kualifikasiGrade(): BelongsTo
	{
		return $this->belongsTo(KualifikasiGrade::class, 'kode_master_kualifikasi_grade','kode');
	}
	
	public function jenisIdentitasKomisaris(): BelongsTo
	{
		return $this->belongsTo(JenisIdentitas::class, 'kode_master_jenis_identitas_komisaris','kode');
	}
	
	public function jabatanVendorKomisaris(): BelongsTo
	{
		return $this->belongsTo(JabatanVendor::class, 'kode_master_jabatan_vendor_komisaris','kode');
	}
	
	public function jenisIdentitasDireksi(): BelongsTo
	{
		return $this->belongsTo(JenisIdentitas::class, 'kode_master_jenis_identitas_direksi','kode');
	}
	
	public function jabatanVendorDireksi(): BelongsTo
	{
		return $this->belongsTo(JabatanVendor::class, 'kode_master_jabatan_vendor_direksi','kode');
	}
	
	public function jenisIdentitasPemegangSaham(): BelongsTo
	{
		return $this->belongsTo(JenisIdentitas::class, 'kode_master_jenis_identitas_pemegang_saham','kode');
	}
	
	public function jenisInventaris(): BelongsTo
	{
		return $this->belongsTo(JenisInventaris::class, 'kode_master_jenis_inventaris','kode');
	}
	
	public function merkInventaris(): BelongsTo
	{
		return $this->belongsTo(JenisMerkInventaris::class, 'kode_master_jenis_merk_inventaris','kode');
	}
}
