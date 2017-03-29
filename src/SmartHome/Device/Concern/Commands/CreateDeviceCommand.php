<?php

namespace Fruty\SmartHome\Device\Concern\Commands;

use Fruty\SmartHome\Common\Status\Status;
use Fruty\SmartHome\Device\Concern\ValueObjects\DeviceType;
use Fruty\SmartHome\Device\Concern\ValueObjects\Pin;
use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeInterface;

class CreateDeviceCommand
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var ExchangeInterface
     */
    private $exchange;
    /**
     * @var Pin
     */
    private $pin;
    /**
     * @var DeviceType
     */
    private $deviceType;
    /**
     * @var Status
     */
    private $status;

    /**
     * CreateDeviceCommand constructor.
     * @param string $name
     * @param ExchangeInterface $exchange
     * @param Pin $pin
     * @param DeviceType $deviceType
     * @param Status $status
     */
    public function __construct(string $name, ExchangeInterface $exchange, Pin $pin, DeviceType $deviceType, Status $status)
    {
        $this->name = $name;
        $this->exchange = $exchange;
        $this->pin = $pin;
        $this->deviceType = $deviceType;
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return ExchangeInterface
     */
    public function getExchange(): ExchangeInterface
    {
        return $this->exchange;
    }

    /**
     * @return Pin
     */
    public function getPin(): Pin
    {
        return $this->pin;
    }

    /**
     * @return DeviceType
     */
    public function getDeviceType(): DeviceType
    {
        return $this->deviceType;
    }

    /**
     * @return Status
     */
    public function getStatus(): Status
    {
        return $this->status;
    }
}
