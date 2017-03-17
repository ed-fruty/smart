<?php
namespace Fruty\SmartHome\Exchange\Concern\Contracts;

interface ConnectorInterface
{
    /**
     * @return string
     */
    public function getName() : string;

    /**
     * @param $dsn
     * @return mixed
     */
    public function connect($dsn);

    /**
     * @return mixed
     */
    public function disconnect();
}
