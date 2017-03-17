<?php
namespace Fruty\SmartHome\Exchange\Concern\Commands;

use Fruty\SmartHome\Common\Status\Status;
use Fruty\SmartHome\Exchange\Concern\Contracts\ConnectorInterface;

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
     * @param string $dsn
     * @param Status $status
     */
    public function __construct(string $name, ConnectorInterface $connector, string $dsn, Status $status)
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
     * @return string
     */
    public function getDsn(): string
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
