<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IplPaymentLog extends Model
{
    use HasFactory;
    protected $table = 'tbl_history_ipl_payments_logs';
    protected $guarded = ['id'];

    public function iplPayment(): BelongsTo
    {
        return $this->belongsTo(IplPayment::class);
    }
}
