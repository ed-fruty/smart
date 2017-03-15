<?php
namespace App\SmartHome\Exchange\Concern\Contracts;

use App\SmartHome\Common\Status\Status;
use App\SmartHome\Exchange\Concern\ValueObjects\ExchangeId;
use Illuminate\Database\Eloquent\Collection;

interface ExchangeInterface
{
    /**
     * @return ExchangeId
     */
    public function getId() : ExchangeId;

    /**
     * @return string
     */
    public function getName() : string;

    /**
     * @return ExchangeTypeInterface
     */
    public function getType() : ExchangeTypeInterface;

    /**
     * @return Status
     */
    public function getStatus() : Status;

    /**
     * Get devices collection.
     *
     * @return Collection
     */
    public function getDevices() : Collection;
}
