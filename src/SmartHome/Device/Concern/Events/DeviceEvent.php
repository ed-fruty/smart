<?php

namespace Fruty\SmartHome\Device\Concern\Events;

use Fruty\SmartHome\Device\Concern\Contracts\DeviceInterface;

class DeviceEvent
{
    public const DEVICE_WAS_CREATED_EVENT = DeviceWasCreatedEvent::class;
    public const DEVICE_WAS_UPDATED_EVENT = DeviceWasUpdatedEvent::class;
    public const DEVICE_WAS_DELETED_EVENT = DeviceWasDeletedEvent::class;

    /**
     * @var DeviceInterface
     */
    private $device;

    /**
     * DeviceEvent constructor.
     * @param DeviceInterface $device
     */
    public function __construct(DeviceInterface $device)
    {
        $this->device = $device;
    }

    /**
     * @return DeviceInterface
     */
    public function getDevice(): DeviceInterface
    {
        return $this->device;
    }
}
