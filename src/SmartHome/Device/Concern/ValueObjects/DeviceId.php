<?php

namespace Fruty\SmartHome\Device\Concern\ValueObjects;

final class DeviceId
{
    /**
     * @var string
     */
    private $id;

    /**
     * DeviceId constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = (string) $id;
    }

    /**
     * @return string
     */
    public function getValue() : string
    {
        return $this->id;
    }

    /**
     * @param DeviceId $deviceId
     * @return bool
     */
    public function equals(DeviceId $deviceId) : bool
    {
        return $this->getValue() === $deviceId->getValue();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getValue();
    }
}
