<?php
namespace Fruty\SmartHome\Exchange\Infrastructure\Eloquent;

use Fruty\SmartHome\Common\Status\Status;
use Fruty\SmartHome\Exchange\Concern\Contracts\ConnectorInterface;
use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeInterface;
use Fruty\SmartHome\Exchange\Concern\Contracts\WriteExchangeInterface;
use Fruty\SmartHome\Exchange\Concern\ValueObjects\Dsn;

/**
 * Class WriteExchange
 * @package Fruty\SmartHome\Exchange\Infrastructure\Eloquent
 */
class WriteExchange extends Exchange implements WriteExchangeInterface
{
    /**
     * @var Exchange
     */
    private $exchange;

    /**
     * WriteExchange constructor.
     * @param array $attributes
     * @param Exchange $exchange
     */
    public function __construct(Exchange $exchange, array $attributes = [])
    {
        $this->exchange = $exchange;

        //parent::__construct($attributes);
    }

    /**
     * @param string $name
     * @return WriteExchangeInterface
     */
    public function setName(string $name) : WriteExchangeInterface
    {
        $this->exchange->setAttribute('name', $name);

        return $this;
    }

    /**
     * @param Status $status
     * @return WriteExchangeInterface
     */
    public function setStatus(Status $status) : WriteExchangeInterface
    {
        $this->exchange->setAttribute('status', $status->getValue());

        return $this;
    }

    /**
     * @return ExchangeInterface
     */
    public function getReadExchange(): ExchangeInterface
    {
        return $this->exchange;
    }

    /**
     * @param Dsn $dsn
     * @return WriteExchangeInterface
     */
    public function setDsn(Dsn $dsn): WriteExchangeInterface
    {
        $this->exchange->setAttribute('dsn', $dsn->getValue());

        return $this;
    }

    /**
     * @param ConnectorInterface $connector
     * @return WriteExchangeInterface
     */
    public function setConnector(ConnectorInterface $connector): WriteExchangeInterface
    {
        $this->exchange->setAttribute('connector_name', $connector->getName());

        return $this;
    }
}
