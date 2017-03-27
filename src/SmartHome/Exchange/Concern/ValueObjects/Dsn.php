<?php

namespace Fruty\SmartHome\Exchange\Concern\ValueObjects;


/**
 * Class Dsn
 * @package Fruty\SmartHome\Exchange\Concern\ValueObjects
 */
final class Dsn
{
    /**
     * @var string
     */
    private $value;

    /**
     * Dsn constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->value;
    }
}