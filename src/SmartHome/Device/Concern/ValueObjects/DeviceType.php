<?php

namespace Fruty\SmartHome\Device\Concern\ValueObjects;

class DeviceType
{
    const TYPE_ANALOG = 1;
    const TYPE_DIGITAL = 2;
    const TYPE_MULTI = 3;
    const TYPE_NAME_ANALOG = 'Analog';
    const TYPE_NAME_DIGITAL = 'Digital';
    const TYPE_NAME_MULTI = 'Multi';


    private $value;

    /**
     * DeviceType constructor.
     * @param $value
     */
    public function __construct($value = null)
    {
        $this->value = $value;
    }

    /**
     * @return array
     */
    public function dropDown()
    {
        return [
            self::TYPE_ANALOG => self::TYPE_NAME_ANALOG,
            self::TYPE_DIGITAL => self::TYPE_NAME_DIGITAL,
            self::TYPE_MULTI => self::TYPE_NAME_MULTI
        ];
    }

    /**
     * @return null
     */
    public function getValue()
    {
        return $this->value;
    }
}
