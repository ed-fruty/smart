<?php
namespace Fruty\SmartHome\Exchange\Concern\Commands;

use Fruty\SmartHome\Exchange\Concern\ValueObjects\ExchangeId;

final class UpdateExchangeCommand
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $typeId;
    /**
     * @var int
     */
    private $status;

    /**
     * @var ExchangeId
     */
    private $exchangeId;

    /**
     * UpdateExchangeCommand constructor.
     * @param ExchangeId $exchangeId
     * @param string $name
     * @param int $typeId
     * @param int $status
     */
    public function __construct(ExchangeId $exchangeId, string $name, int $typeId, int $status)
    {
        $this->name = $name;
        $this->typeId = $typeId;
        $this->status = $status;
        $this->exchangeId = $exchangeId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getTypeId(): int
    {
        return $this->typeId;
    }

    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return ExchangeId
     */
    public function getExchangeId(): ExchangeId
    {
        return $this->exchangeId;
    }
}
