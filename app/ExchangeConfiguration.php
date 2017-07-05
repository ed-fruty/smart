<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ExchangeConfiguration
 * @package App
 *
 * @property int $id
 * @property string $dsn
 * @property string $ping_time
 * @property int $exchange_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Exchange $exchange
 */
class ExchangeConfiguration extends Model
{

    /**
     * Mass assignment attributes.
     *
     * @var array
     */
    protected $fillable = ['dsn', 'ping_time'];

    /**
     * Casts attributes.
     *
     * @var array
     */
    protected $casts = [
        'id'    => 'int'
    ];

    /**
     * Exchange relation.
     *
     * @return BelongsTo
     */
    public function exchange(): BelongsTo
    {
        return $this->belongsTo(Exchange::class);
    }
}
