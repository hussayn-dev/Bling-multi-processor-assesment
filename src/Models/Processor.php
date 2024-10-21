<?php

namespace HussDev\Assessment\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * @property ?Carbon $created_at
 * @property ?Carbon $updated_at
 * @property string $name
 */
class Processor extends Model
{
    protected $fillable = [
        'name', 'currency_available', 'transaction_cost'
    ];

    protected $casts = [
        'currency_available' => 'array',
    ];


}
