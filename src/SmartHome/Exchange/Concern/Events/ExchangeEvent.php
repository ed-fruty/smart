<?php

namespace Fruty\SmartHome\Exchange\Concern\Events;

use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeInterface;

/**
 * Class ExchangeEvent
 * @package Fruty\SmartHome\Exchange\Concern\Events
 */
class ExchangeEvent
{
    public const EXCHANGE_WAS_CREATED = ExchangeWasCreated::class;
    public const EXCHANGE_WAS_DELETED = ExchangeWasDeleted::class;
    public const EXCHANGE_WAS_UPDATED = ExchangeWasUpdated::class;

    public const EVENTS = [
        self::EXCHANGE_WAS_CREATED,
        self::EXCHANGE_WAS_DELETED,
        self::EXCHANGE_WAS_UPDATED
    ];

    /**
     * @var ExchangeInterface
     */
    private $exchange;

    /**
     * ExchangeWasCreated constructor.
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
