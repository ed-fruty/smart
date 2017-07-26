<?php

namespace App;

use App\Common\Status\HasStatus;
use App\Common\Status\Status;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class DeviceProperty
 * @package App
 *
 * @property int $id
 * @property string $name
 * @property string $remote_name
 * @property Status $status
 * @property int $device_id
 * @property string $type
 * @property string|int $current_value
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class DeviceProperty extends Model
{
    use HasStatus;

    /**
     * Mass assignment attributes.
     *
     * @var array
     */
    protected $fillable = ['name', 'remote_name', 'status'];

    /**
     * Casts attributes.
     *
     * @var array
     */
    protected $casts = [
        'id'    => 'int',
        'device_id' =>  'int'
    ];

    /**
     * Device relation.
     *
     * @return BelongsTo
     */
    public function device(): BelongsTo
    {
        return $this->belongsTo(Device::class);
    }

    /**
     * Configuration relation.
     *
     * @return HasOne
     */
    public function configuration(): HasOne
    {
        return $this->hasOne(DevicePropertyConfiguration::class);
    }

    /**
     * History relation.
     *
     * @return HasMany
     */
    public function history(): HasMany
    {
        return $this->hasMany(DevicePropertyHistory::class);
    }
}