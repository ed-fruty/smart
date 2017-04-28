<?php

namespace App\Arduino\Connection\Contracts;

interface DriverResolverInterface
{
    /**
     * @param string $dsn
     * @param array $options
     * @return DriverInterface
     */
    public function resolve(string $dsn, array $options = []);
}
