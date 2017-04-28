<?php

namespace Fruty\SmartHome\Device\Concern\Contracts;

interface DeviceModelFactoryInterface
{

    /**
     * @return DeviceInterface
     */
    public function createReadDevice() : DeviceInterface;

    /**
     * @param DeviceInterface $device
     * @return WriteDeviceInterface
     */
    public function createWriteDevice(DeviceInterface $device) : WriteDeviceInterface;
}
