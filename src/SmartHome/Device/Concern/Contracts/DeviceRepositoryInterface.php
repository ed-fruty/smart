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
    public function getFactory() : DeviceModelFactoryInterface;

    /**
     * @param DeviceInterface $device
     * @return bool
     */
    public function save(DeviceInterface $device) : bool;

    /**
     * @param DeviceInterface $device
     * @return bool
     */
    public function remove(DeviceInterface $device) : bool;
}
