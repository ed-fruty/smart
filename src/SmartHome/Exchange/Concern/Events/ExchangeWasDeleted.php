<?php

namespace Fruty\SmartHome\Exchange\Concern\Events;

use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeInterface;

final class ExchangeWasDeleted
{
    /**
     * @var ExchangeInterface
     */
    private $exchange;

    /**
     * ExchangeWasDeleted constructor.
     * @param ExchangeInterface $exchange
     */
    public function __construct(ExchangeInterface $exchange)
    {
        $this->exchange = $exchange;
    }

    /**
     * @return ExchangeInterface
     */
    public function getExchange(): ExchangeInterface
    {
        return $this->exchange;
    }
}
