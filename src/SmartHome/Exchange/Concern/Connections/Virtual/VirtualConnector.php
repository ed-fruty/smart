<?php
namespace Fruty\SmartHome\Exchange\Concern\Connections\Virtual;

use Fruty\SmartHome\Exchange\Concern\Contracts\ConnectorInterface;

class VirtualConnector implements ConnectorInterface
{
    private const NAME = 'Virtual';

    /**
     * @return string
     */
    public function getName(): string
    {
        return self::NAME;
    }

    /**
     * @param $dsn
     * @return mixed
     */
    public function connect($dsn)
    {
        return true;
    }

    /**
     * @return mixed
     */
    public function disconnect()
    {
        return true;
    }
}
