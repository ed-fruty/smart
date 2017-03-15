<?php
namespace App\SmartHome\Exchange\Concern\ValueObjects;

final class ExchangeId
{
    /**
     * @var string
     */
    private $id;

    /**
     * ExchangeId constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = (string) $id;
    }

    /**
     * @return string
     */
    public function getId() : string
    {
        return $this->id;
    }

    /**
     * @param ExchangeId $exchangeId
     * @return bool
     */
    public function equals(ExchangeId $exchangeId) : bool
    {
        return $this->getId() === $exchangeId->getId();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getId();
    }

}
