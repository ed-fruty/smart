<?php

namespace App;

use App\Common\Status\HasStatus;
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
 *
 * @property Collection|Device[] $devices
 */
class Exchange extends Model
{
    use HasStatus;

    public const ATTRIBUTE_ID = 'id';
    public const ATTRIBUTE_NAME = 'name';
    public const ATTRIBUTE_STATUS = 'status';

    public const ATTRIBUTES = [
        self::ATTRIBUTE_ID,
        self::ATTRIBUTE_NAME,
        self::ATTRIBUTE_STATUS
    ];

    protected $fillable = [
        self::ATTRIBUTE_NAME,
        self::ATTRIBUTE_STATUS
    ];

    protected $casts = [
        self::ATTRIBUTE_ID => 'int',
        self::ATTRIBUTE_NAME    => 'string',
        self::ATTRIBUTE_STATUS  => Common\Status\Status::class
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
     * @return BelongsTo
     */
    public function settings(): BelongsTo
    {
        return $this->belongsTo(ExchangeSettings::class);
    }
}
