<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class DevicePropertyHistory
 * @package App
 *
 * @property int $id
 * @property int $property_id
 * @property string|int $value
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property DeviceProperty $property
 */
class DevicePropertyHistory extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['value'];

    /**
     * @var array
     */
    protected $casts = [
        'id'   => 'int',
        'property_id'   => 'int'
    ];

    /**
     * @return BelongsTo
     */
    public function property(): BelongsTo
    {
        return $this->belongsTo(DeviceProperty::class);
    }
}
