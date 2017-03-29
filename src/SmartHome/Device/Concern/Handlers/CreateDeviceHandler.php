<?php

namespace Fruty\SmartHome\Device\Concern\Handlers;

use Fruty\SmartHome\Device\Concern\Commands\CreateDeviceCommand;

class CreateDeviceHandler
{
    public function handle(CreateDeviceCommand $command)
    {
        $device = $this->deviceRepository->getFactory()->createReadDevice();

        $writeDevice = $this->deviceRepository->getFactory()->createWriteDevice($device);
        $writeDevice->setName($command->getName());
        $writeDevice->setStatus($command->getStatus());


        $this->deviceRepository->save($writeDevice->getReadDevice());
    }
}
