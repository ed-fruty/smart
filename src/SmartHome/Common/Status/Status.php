<?php
namespace Fruty\SmartHome\Common\Status;

class Status
{
    private const STATUS_ENABLED = 1;
    private const STATUS_DISABLED = -1;
    private const STATUS_NAME_ENABLED = 'Enabled';
    private const STATUS_NAME_DISABLED = 'Disabled';

    private $value;

    /**
     * Status constructor.
     * @param null $value
     */
    public function __construct($value = null)
    {
        if ($value) {
            $list = $this->dropDown();

            if (! isset($list[$value])) {
                throw new \InvalidArgumentException("Unknown status value");
            }

            $this->value = $value;
        }
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->dropDown()[$this->value];
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }


    /**
     * @return array
     */
    public function dropDown()
    {
        return [
            self::STATUS_DISABLED => self::STATUS_NAME_DISABLED,
            self::STATUS_ENABLED  => self::STATUS_NAME_ENABLED
        ];
    }

    /**
     * @param $value
     * @return static
     */
    public function fromValue($value)
    {
        return new static($value);
    }
}
