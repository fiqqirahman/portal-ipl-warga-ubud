<?php

namespace App\Models\Master;

use App\Enums\DocumentForEnum;
use App\Models\User;
use App\Traits\Model\Scope\IsActive;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create(array $param)
 * @method static updateOrCreate(array $array, $data)
 */
class Dokumen extends Model
{
    use IsActive;

    protected $table = 'tbl_master_dokumen';

    protected $guarded = ['id'];
	
	protected function casts(): array
	{
		return [
			'for' => DocumentForEnum::class,
		];
	}
	
	protected function allowedFileTypes(): Attribute
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
}
