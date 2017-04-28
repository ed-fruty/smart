<?php

namespace App\Common\Status;

/**
 * Trait Statusable
 * @package App\Common\Status
 *
 * @property Status status
 */
trait Statusable
{
    /**
     * @return Status
     */
    public function getStatusAttribute()
    {
        return new Status($this->attributes['status']);
    }
}
