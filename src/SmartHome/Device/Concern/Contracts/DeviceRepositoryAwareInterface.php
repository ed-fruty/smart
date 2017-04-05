<?php

namespace Fruty\SmartHome\Device\Concern\Contracts;

interface DeviceRepositoryAwareInterface
{
    /**
     * @param DeviceRepositoryInterface $deviceRepository
     */
    public function setDeviceRepository(DeviceRepositoryInterface $deviceRepository);
}
