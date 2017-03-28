<?php
namespace Fruty\SmartHome\Exchange\Concern\Commands;

use Fruty\SmartHome\Exchange\Concern\ValueObjects\ExchangeId;

final class DeleteExchangeCommand
{
    /**
     * @var ExchangeId
     */
    private $exchangeId;

    /**
     * DeleteExchangeCommand constructor.
     * @param ExchangeId $exchangeId
     */
    public function __construct(ExchangeId $exchangeId)
    {
        $this->exchangeId = $exchangeId;
    }

    /**
     * @return ExchangeId
     */
    public function getExchangeId(): ExchangeId
    {
        return $this->exchangeId;
    }
}
