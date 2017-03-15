<?php
namespace App\SmartHome\Exchange\Concern\Events;

use App\SmartHome\Exchange\Concern\Contracts\ExchangeInterface;

class ExchangeWasUpdated
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
