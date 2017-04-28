<?php
namespace App\Arduino\Connection;


use App\Arduino\Connection\Contracts\DriverInterface;

class ConnectionManager
{
    protected $connections = [];

    /**
     * @var Config
     */
    private $config;

    /**
     * @var Factory
     */
    private $factory;

    public function __construct(Config $config, Factory $factory)
    {
        $this->config = $config;
        $this->factory = $factory;
        $this->factory->setConfig($this->config);
    }

    /**
     * @return Config
     */
    public function getConfig(): Config
    {
        return $this->config;
    }

    /**
     * @param null $connection
     * @return DriverInterface
     */
    public function getConnection($connection = null)
    {
        $connection = $connection ?? $this->config->getDefaultConnection();

        return $this->connections[$connection] ?? $this->createConnection($connection);
    }

    /**
     * @param $connection
     * @return DriverInterface
     */
    protected function createConnection($connection)
    {
        return $this->connections[$connection] = $this->factory->create($connection);
    }
}
