<?php
namespace Fruty\SmartHome\Exchange\Concern\Events;

use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeInterface;

final class ExchangeWasUpdated
{
    /**
     * @var ExchangeInterface
     */
    private $exchange;

    /**
     * ExchangeWasUpdated constructor.
     * @param ExchangeInterface $exchange
     */
    public function __construct(ExchangeInterface $exchange)
    {
        $this->exchange = $exchange;
    }
}
