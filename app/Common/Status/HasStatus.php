<?php

namespace App\Common\Status;

use Illuminate\Database\Eloquent\Builder;

/**
 * Trait Statusable
 * @package App\Common\Status
 *
 * @property Status status
 *
 * @method Builder enabled()
 * @method Builder disabled()
 */
trait HasStatus
{
    /**
     * @param int $status
     * @return Status
     */
    public function getStatusAttribute(int $status): Status
    {
        return new Status($status);
    }

    /**
     * @param Status|int $status
     */
    public function setStatusAttribute($status)
    {
        $status = is_integer($status) ? new Status($status) : $status;

        if (false === $status instanceof Status) {
            throw new \InvalidArgumentException(sprintf('Invalid status value: %s', $status));
        }
        
        $this->attributes['status'] = $status->getValue();
    }

    /**
     * @param Builder $query
     */
    public function scopeEnabled(Builder $query)
    {
        $query->where('status', Status::STATUS_ENABLED);
    }

    /**
     * @param Builder $query
     */
    public function scopeDisabled(Builder $query)
    {
        $query->where('status', Status::STATUS_DISABLED);
    }

    /**
     * @param Status $status
     */
    public function setStatus(Status $status)
    {
        $this->status = $status;
    }

    /**
     * @return Status
     */
    public function getStatus(): Status
    {
        return $this->status;
    }
}
