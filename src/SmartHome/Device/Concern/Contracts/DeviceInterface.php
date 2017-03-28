<?php

namespace Fruty\SmartHome\Device\Concern\Contracts;

use Carbon\Carbon;
use Fruty\SmartHome\Common\Status\Status;
use Fruty\SmartHome\Device\Concern\ValueObjects\DeviceId;
use Fruty\SmartHome\Device\Concern\ValueObjects\DeviceType;
use Fruty\SmartHome\Device\Concern\ValueObjects\Pin;
use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeInterface;

interface DeviceInterface
{
    /**
     * Get device id.
     *
     * @return DeviceId
     */
    public function getId() : DeviceId;

    /**
     * Get device name.
     *
     * @return string
     */
    public function getName() : string;

    /**
     * @return ExchangeInterface
     */
    public function getExchange() : ExchangeInterface;

    /**
     * Get device pin.
     *
     * @return Pin
     */
    public function getPin() : Pin;

    /**
     * Get device type.
     *
     * @return DeviceType
     */
    public function getType() : DeviceType;

    /**
     * Get device status.
     *
     * @return Status
     */
    public function getStatus() : Status;

    /**
     * Get created date.
     *
     * @return Carbon
     */
    public function getCreatedAt() : Carbon;

    /**
     * Get updated date.
     *
     * @return Carbon
     */
    public function getUpdatedAt() : Carbon;

    /**
     * @return DeviceCommands
     */
    public function getCommands() : DeviceCommands;
}
