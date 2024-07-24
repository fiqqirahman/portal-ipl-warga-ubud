<?php

namespace App\Traits\Model\Scope;

use Illuminate\Database\Eloquent\Builder;

/**
 * @method static Builder isActive($boolean = true, $orderBy = 'id', $direction = 'ASC')
 */

trait IsActive
{
    /**
     * Scope Is Active / Status Data
     *
     * @param $query
     * @param bool $boolean
     * @param string $orderBy ASC|DESC|RANDOM
     * @param string $direction
     * @return Builder \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsActive($query, bool $boolean = true, string $orderBy = 'id', string $direction = 'ASC'): Builder
    {
        if(strtoupper($direction) == 'RANDOM'){
            return $query->whereStatusData($boolean)->inRandomOrder();
        }
        return $query->whereStatusData($boolean)->orderBy($orderBy, $direction);
    }
}