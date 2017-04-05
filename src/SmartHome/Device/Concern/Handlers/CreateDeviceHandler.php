<?php

namespace Fruty\SmartHome\Device\Concern\Handlers;

use Fruty\SmartHome\Device\Concern\Commands\CreateDeviceCommand;
use Fruty\SmartHome\Device\Concern\Contracts\DeviceRepositoryAwareInterface;
use Fruty\SmartHome\Device\Concern\Contracts\DeviceRepositoryInterface;
use Fruty\SmartHome\Device\Concern\Traits\DeviceRepositoryAware;

class CreateDeviceHandler implements DeviceRepositoryAwareInterface
{
    use DeviceRepositoryAware;

    public function handle(CreateDeviceCommand $command)
    {
        $device = $this->deviceRepository->getFactory()->createReadDevice();

        $writeDevice = $this->deviceRepository->getFactory()->createWriteDevice($device);
        $writeDevice->setName($command->getName());
        $writeDevice->setStatus($command->getStatus());


        $this->deviceRepository->save($writeDevice->getReadDevice());
    }
}
