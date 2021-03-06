<?php

namespace App\Common\Status;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class Status implements Arrayable, Jsonable, \JsonSerializable
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    private $value;

    /**
     * Status constructor.
     * @param int $value
     */
    public function __construct(int $value)
    {
        $list = static::dropDown();

        if (! isset($list[$value])) {
            throw new \InvalidArgumentException(sprintf('Undefined status %s', $value));
        }

        $this->value = $value;
    }

    /**
     * @return array
     */
    public static function dropDown()
    {
        return [
            self::STATUS_DISABLED   => trans('Disabled'),
            self::STATUS_ENABLED    => trans('Enabled'),
        ];
    }

    /**
     * @param string $name
     * @return Status
     */
    public static function createFromName(string $name): Status
    {
        return new static((int) array_search($name, static::dropDown()));
    }

    /**
     * @return string
     */
    public function getName(): string
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
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'name'  => $this->getName(),
            'value' => $this->getValue()
        ];
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->jsonSerialize(), $options);
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    function jsonSerialize()
    {
        return $this->toArray();
    }
}
