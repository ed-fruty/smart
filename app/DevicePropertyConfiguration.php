<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class DevicePropertyConfiguration
 * @package App
 *
 * @property int $id
 * @property int $history_mode_id
 * @property int $log_mode_id
 * @property string $ping_time
 * @property int $property_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Mode $logMode
 * @property Mode $historyMode
 * @property DeviceProperty $property
 */
class DevicePropertyConfiguration extends Model
{
    /**
     * Mass assignment attributes.
     *
     * @var array
     */
    protected $fillable = ['history_mode_id', 'log_mode_id', 'ping_time'];

    /**
     * Attribute casts.
     *
     * @var array
     */
    protected $casts = [
        'id'    => 'int',
        'history_mode_id'   => 'int',
        'log_mode_id' => 'int',
        'property_id' => 'int'
    ];

    /**
     * @return BelongsTo
     */
    public function property(): BelongsTo
    {
        return $this->belongsTo(DeviceProperty::class);
    }

    /**
     * @return BelongsTo
     */
    public function historyMode(): BelongsTo
    {
        return $this->belongsTo(Mode::class);
    }

    /**
     * @return BelongsTo
     */
    public function logMode(): BelongsTo
    {
        return $this->belongsTo(Mode::class);
    }
}
