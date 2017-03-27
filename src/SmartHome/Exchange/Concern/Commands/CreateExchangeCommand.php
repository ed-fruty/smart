<?php
namespace Fruty\SmartHome\Exchange\Concern\Commands;

use Fruty\SmartHome\Common\Status\Status;
use Fruty\SmartHome\Exchange\Concern\Contracts\ConnectorInterface;
use Fruty\SmartHome\Exchange\Concern\ValueObjects\Dsn;

class CreateExchangeCommand
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
     * @var ConnectorInterface
     */
    private $connector;
    /**
     * @var string
     */
    private $dsn;

    /**
     * CreateExchangeCommand constructor.
     * @param string $name
     * @param ConnectorInterface $connector
     * @param Dsn $dsn
     * @param Status $status
     */
    public function __construct(string $name, ConnectorInterface $connector, Dsn $dsn, Status $status)
    {
        $this->name = $name;
        $this->status = $status;
        $this->connector = $connector;
        $this->dsn = $dsn;
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
    public function getStatus(): Status
    {
        return $this->status;
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
