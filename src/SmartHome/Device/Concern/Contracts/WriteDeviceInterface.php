<?php

namespace Fruty\SmartHome\Device\Concern\Contracts;

use Fruty\SmartHome\Common\Status\Status;
use Fruty\SmartHome\Device\Concern\ValueObjects\DeviceType;
use Fruty\SmartHome\Device\Concern\ValueObjects\Pin;
use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeInterface;

interface WriteDeviceInterface
{
    /**
     * @param string $name
     */
    public function setName(string $name);

    /**
     * @param ExchangeInterface $exchange
     */
    public function setExchange(ExchangeInterface $exchange);

    /**
     * @param Pin $pin
     */
    public function setPin(Pin $pin);

    /**
     * @param Status $status
     */
    public function setStatus(Status $status);

    /**
     * @param DeviceType $type
     */
    public function setType(DeviceType $type);

    /**
     * @param CommandInterface $command
     */
    public function addCommand(CommandInterface $command);

    /**
     * @return DeviceInterface
     */
    public function getReadDevice() : DeviceInterface;
}
