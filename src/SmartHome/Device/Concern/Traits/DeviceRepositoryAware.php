<?php

namespace Fruty\SmartHome\Device\Concern\Traits;

use Fruty\SmartHome\Device\Concern\Contracts\DeviceRepositoryInterface;

trait DeviceRepositoryAware
{
    /**
     * @var DeviceRepositoryInterface
     */
    protected $deviceRepository;

    /**
     * @param DeviceRepositoryInterface $deviceRepository
     */
    public function setDeviceRepository(DeviceRepositoryInterface $deviceRepository)
    {
        $this->deviceRepository = $deviceRepository;
    }

}
