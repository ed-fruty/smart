<?php
namespace Fruty\SmartHome\Exchange\Concern\Commands;

use Fruty\SmartHome\Common\Status\Status;
use Fruty\SmartHome\Exchange\Concern\Contracts\ConnectorInterface;
use Fruty\SmartHome\Exchange\Concern\ValueObjects\Dsn;
use Fruty\SmartHome\Exchange\Concern\ValueObjects\ExchangeId;

final class UpdateExchangeCommand
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var Status
     */
    private $status;

    /**
     * @var ExchangeId
     */
    private $exchangeId;

    /**
     * @var Dsn
     */
    private $dsn;

    /**
     * @var ConnectorInterface
     */
    private $connector;

    /**
     * UpdateExchangeCommand constructor.
     * @param ExchangeId $exchangeId
     * @param string $name
     * @param Dsn $dsn
     * @param Status|int $status
     */
    public function __construct(ExchangeId $exchangeId, string $name, ConnectorInterface $connector, Dsn $dsn, Status $status)
    {
        $this->name = $name;
        $this->status = $status;
        $this->exchangeId = $exchangeId;
        $this->dsn = $dsn;
        $this->connector = $connector;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Status
     */
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

    /**
     * @return Dsn
     */
    public function getDsn(): Dsn
    {
        return $this->dsn;
    }

    /**
     * @return ConnectorInterface
     */
    public function getConnector(): ConnectorInterface
    {
        return $this->connector;
    }
}
