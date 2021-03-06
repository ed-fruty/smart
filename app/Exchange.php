<?php

namespace App;

use App\Common\Status\Status;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Exchange
 * @package App
 *
 * @property int $id
 * @property string $name
 * @property Status $status
 * @property int $type
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property ExchangeConfiguration $configuration
 * @property Collection|Device[] $devices
 *
 * @property string $type_name
 */
class Exchange extends Model
{
    public const TYPE_ARDUINO = 1;
    public const TYPE_STREAM = 2;
    public const TYPE_RESOURCE = 3;
    public const TYPE_RASPBERRY = 4;

    /**
     * Mass assignment attributes.
     *
     * @var array
     */
    protected $fillable = ['name', 'status', 'type'];

    /**
     * Casts attributes.
     *
     * @var array
     */
    protected $casts = [
        'id'    => 'int',
        'type'  => 'int'
    ];

    /**
     * @var array
     */
    protected $appends = ['type_name'];

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
     * @return HasOne
     */
    public function configuration(): HasOne
    {
        return $this->hasOne(ExchangeConfiguration::class);
    }

    /**
     * @return array
     */
    public static function typesDropDown()
    {
        return [
            self::TYPE_ARDUINO  => 'Arduino',
            self::TYPE_STREAM   => 'Stream',
            self::TYPE_RESOURCE => 'Resource',
            self::TYPE_RASPBERRY => 'Raspberry'
        ];
    }

    /**
     * @return string
     */
    public function getTypeNameAttribute(): string
    {
        return static::typesDropDown()[$this->type];
    }
}
