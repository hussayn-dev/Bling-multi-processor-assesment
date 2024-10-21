<?php

namespace Bling\Assessment\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;
use Spatie\Permission\Contracts\Permission as PermissionContract;
use Spatie\Permission\Exceptions\PermissionAlreadyExists;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use Spatie\Permission\Guard;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Traits\RefreshesPermissionCache;

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
