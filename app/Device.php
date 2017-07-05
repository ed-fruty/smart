<?php

namespace App;

use App\Common\Status\HasStatus;
use App\Common\Status\Status;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Device
 * @package App
 *
 * @property int $id
 * @property string $name
 * @property int $pin
 * @property Status $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Exchange $exchange
 */
class Device extends Model
{
    use HasStatus;

    /**
     * @var array
     */
    protected $fillable = ['name', 'status'];

    /**
     * @var array
     */
    protected $casts = [
        'id'    => 'int',
        'pin'   => 'int'
    ];

    /**
     * @return BelongsTo
     */
    public function exchange(): BelongsTo
    {
        return $this->belongsTo(Exchange::class);
    }
}
