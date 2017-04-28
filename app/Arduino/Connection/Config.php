<?php

namespace App\Arduino\Connection;

use App\Arduino\Connection\Contracts\DriverResolverInterface;

class Config
{
    /**
     * @var string
     */
    protected $defaultConnection;

    /**
     * @var array
     */
    protected $connections = [];

    /**
     * @var array
     */
    protected $drivers = [];

    /**
     * @return string
     */
    public function getDefaultConnection(): string
    {
        return $this->defaultConnection;
    }

    /**
     * @param string $defaultConnection
     */
    public function setDefaultConnection(string $defaultConnection)
    {
        $this->defaultConnection = $defaultConnection;
    }

    /**
     * @return array
     */
    public function getConnections(): array
    {
        return $this->connections;
    }

    /**
     * @param array $connections
     */
    public function setConnections(array $connections)
    {
        $this->connections = $connections;
    }

    /**
     * @param string $name
     * @param string $driver
     * @param string $dsn
     * @param array $options
     */
    public function addConnection(string $name, string $driver, string $dsn, array $options = [])
    {
        $this->connections[$name] = compact('driver', 'dsn', 'options');
    }

    /**
     * @param $name
     * @param $resolver
     */
    public function extend($name, DriverResolverInterface $resolver)
    {
        $this->drivers[$name] = $resolver;
    }

    /**
     * @return array
     */
    public function getAvailableDrivers()
    {
        return array_keys($this->drivers);
    }

    /**
     * @param $name
     * @return mixed
     */
    public function getDriverResolver($name)
    {
        return $this->drivers[$name] ?? $this->exception();
    }

    /**
     *
     */
    private function exception()
    {
        throw new \InvalidArgumentException('Undefined driver');
    }
}
