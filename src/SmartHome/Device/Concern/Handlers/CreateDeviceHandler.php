<?php

namespace Fruty\SmartHome\Device\Concern\Handlers;

use Fruty\SmartHome\Common\Events\Contracts\EventDispatcherAwareInterface;
use Fruty\SmartHome\Common\Events\Traits\EventDispatcherAware;
use Fruty\SmartHome\Device\Concern\Commands\CreateDeviceCommand;
use Fruty\SmartHome\Device\Concern\Contracts\DeviceInterface;
use Fruty\SmartHome\Device\Concern\Contracts\DeviceRepositoryAwareInterface;
use Fruty\SmartHome\Device\Concern\Events\DeviceEvent;
use Fruty\SmartHome\Device\Concern\Events\DeviceWasCreatedEvent;
use Fruty\SmartHome\Device\Concern\Traits\DeviceRepositoryAware;

class CreateDeviceHandler implements DeviceRepositoryAwareInterface, EventDispatcherAwareInterface
{
    use DeviceRepositoryAware, EventDispatcherAware;

    /**
     * @param CreateDeviceCommand $command
     * @return DeviceInterface
     */
    public function handle(CreateDeviceCommand $command)
    {
        $device = $this->createDeviceInstance($command);

        $this->deviceRepository->save($device);
        $this->eventDispatcher->dispatch(DeviceEvent::DEVICE_WAS_CREATED_EVENT, new DeviceWasCreatedEvent($device));

        return $device;
    }

    /**
     * @param CreateDeviceCommand $command
     * @return DeviceInterface
     */
    private function createDeviceInstance(CreateDeviceCommand $command)
    {
        $device = $this->deviceRepository->getFactory()->createReadDevice();

        $writeDevice = $this->deviceRepository->getFactory()->createWriteDevice($device);
        $writeDevice->setName($command->getName());
        $writeDevice->setStatus($command->getStatus());
        $writeDevice->setExchange($command->getExchange());
        $writeDevice->setPin($command->getPin());
        $writeDevice->setType($command->getDeviceType());

        return $writeDevice->getReadDevice();
    }
}
