<?php

namespace Fruty\SmartHome\Device\Concern\Contracts;

interface DeviceModelFactoryInterface
{

    /**
     * @return DeviceInterface
     */
    public function createReadDevice() : DeviceInterface;

    /**
     * @return WriteDeviceInterface
     */
    public function createWriteDevice() : WriteDeviceInterface;
}
