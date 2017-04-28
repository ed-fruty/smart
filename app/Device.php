<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $table = 'devices';

    protected $fillable = [];

    /**
     * Exchange relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function exchange()
    {
        return $this->belongsTo(Exchange::class);
    }

    /**
     * Device commands relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commands()
    {
        return $this->hasMany(DeviceCommand::class);
    }
}
