<?php

namespace App;

use App\Common\Status\Status;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Exchange
 * @package App
 *
 * @property int $id
 * @property string $name
 * @property Status $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property ExchangeConfiguration $configuration
 * @property Collection|Device[] $devices
 */
class Exchange extends Model
{

    /**
     * Mass assignment attributes.
     *
     * @var array
     */
    protected $fillable = ['name', 'status'];

    /**
     * Casts attributes.
     *
     * @var array
     */
    protected $casts = [
        'id'    => 'int',
    ];

    /**
     * Devices relation.
     *
     * @return HasMany
     */
    public function devices(): HasMany
    {
        return $this->hasMany(Device::class);
    }

    /**
     * Configuration relation.
     *
     * @return BelongsTo
     */
    public function configuration(): BelongsTo
    {
        return $this->belongsTo(ExchangeConfiguration::class);
    }
}
