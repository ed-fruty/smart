<?php

namespace App\Common\Status;

/**
 * Trait HasStatus
 * @package App\Common\Status
 *
 * @property Status status
 */
trait HasStatus
{
    /**
     * @return Status
     */
    public function getStatusAttribute()
    {
        return new Status($this->attributes['status']);
    }

    /**
     * @param Status $status
     */
    public function setStatusAttribute(Status $status)
    {
        $this->attributes['status'] = $status->getValue();
    }
}
