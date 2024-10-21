<?php

namespace Bling\Assessment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Processors\Processor;
use Illuminate\Support\Carbon;


/**
 * @property ?Carbon $created_at
 * @property ?Carbon $updated_at
 */
class PaymentAnalytics extends Model
{

    protected $fillable = [
        "processor_id",
        "is_transaction_approved",
        "reference",
    ];

    public function processor(): BelongsTo
    {
        return $this->belongsTo(Processor::class);
    }
}
