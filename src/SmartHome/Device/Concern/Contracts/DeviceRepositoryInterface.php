<?php

namespace Fruty\SmartHome\Device\Concern\Contracts;

use Fruty\SmartHome\Device\Concern\ValueObjects\DeviceId;

interface DeviceRepositoryInterface
{
    /**
     * @param DeviceId $deviceId
     * @return DeviceInterface
     */
    public function findOrFail(DeviceId $deviceId);

    /**
     * @return DeviceModelFactoryInterface
     */
    public function getDeviceModelFactory() : DeviceModelFactoryInterface;
}
