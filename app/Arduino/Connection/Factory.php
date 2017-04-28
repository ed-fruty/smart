<?php

namespace App\Arduino\Connection;

class Factory
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @param Config $config
     */
    public function setConfig(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @param string $connection
     * @return mixed
     */
    public function create(string $connection)
    {
        $connections = $this->config->getConnections();
        $drivers = $this->config->getAvailableDrivers();

        if (! isset($connections[$connection])) {
            throw new \InvalidArgumentException('Invalid connection');
        }

        $config = $connections[$connection];

        if (! isset($config['driver']) || ! in_array($config['driver'], $drivers)) {
            throw new \InvalidArgumentException(sprintf('Unsupported driver %s', $config['driver']));
        }

        return $this->config->getDriverResolver($config['driver'])
            ->resolve($config['dsn'], $config['options']);
    }
}
