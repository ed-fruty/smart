<?php
namespace Fruty\SmartHome\Exchange\Concern\Contracts;

use Fruty\SmartHome\Common\Status\Status;

interface WriteExchangeInterface extends ExchangeInterface
{
    public function setName(string $name) : WriteExchangeInterface;

    public function setStatus(Status $status) : WriteExchangeInterface;

    public function setDsn(string $dsn) : WriteExchangeInterface;

    public function setConnector(ConnectorInterface $connector) : WriteExchangeInterface;

    public function getReadExchange() : ExchangeInterface;
}
