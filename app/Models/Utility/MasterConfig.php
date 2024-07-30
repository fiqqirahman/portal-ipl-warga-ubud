<?php

namespace App\Models\Utility;

use App\Enums\MasterConfigKeyEnum;
use App\Enums\MasterConfigTypeEnum;
use App\Observers\MasterConfigObserver;
use Eloquent;
use Exception;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Master\MasterConfig
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @property string $description
 * @property string $type
 * @property boolean $is_private
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|MasterConfig newModelQuery()
 * @method static Builder|MasterConfig newQuery()
 * @method static Builder|MasterConfig query()
 * @mixin Eloquent
 */

#[ObservedBy([MasterConfigObserver::class])]
class MasterConfig extends Model
{
	protected $table = 'tbl_master_config';
	protected $primaryKey = 'id';
	protected $fillable = ['key','value','description','type','is_private'];
	
	protected $casts = [
		'key' => 'string',
		'value' => 'string',
		'description' => 'string',
		'type' => MasterConfigTypeEnum::class,
		'is_private' => 'boolean'
	];
	
	public function resolveRouteBinding($value, $field = null)
	{
		try {
			return $this->where($field ?? $this->getRouteKeyName(), dekrip($value))->firstOrFail();
		} catch (Exception $exception) {
			abort(404);
		}
	}
	
	public static function isConfig(): array
	{
		return [
			MasterConfigKeyEnum::SecuritySessionLifetime->value
		];
	}
}
