<?php

namespace Fruty\SmartHome\Device\Concern\ValueObjects;

final class Pin
{
    private $value;

    /**
     * Pin constructor.
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}
