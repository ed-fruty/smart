<?php
namespace Fruty\SmartHome\Exchange\Concern\Connections;

use Fruty\SmartHome\Exchange\Concern\Contracts\ConnectorInterface;
use Illuminate\Support\Collection;

class ConnectorAggregate
{
    private $connectors;

    /**
     * ConnectionManager constructor.
     */
    public function __construct()
    {
        $this->connectors  = new Collection();
    }

    /**
     * @param ConnectorInterface $connector
     */
    public function register(ConnectorInterface $connector)
    {
        $this->connectors[$connector->getName()] = $connector;
    }

    /**
     * @param string $name
     * @return ConnectorInterface
     */
    public function get(string $name)
    {
        return $this->connectors[$name];
    }

    /**
     * @param string $name
     * @return bool
     */
    public function has(string $name)
    {
        return isset($this->connectors[$name]);
    }

    /**
     * @return Collection
     */
    public function getConnectors()
    {
        return $this->connectors;
    }
}

