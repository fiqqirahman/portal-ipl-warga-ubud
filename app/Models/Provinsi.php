<?php

namespace App\Models;

use App\Traits\Model\Scope\IsActive;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use IsActive;

    protected $table = 'tbl_master_provinsi';

    protected $guarded = ['id'];
    function scopeAktif($query)
    {
        return $query->where('status_data', 1);
    }
}
