<?php

namespace App\Arduino\Connection\Drivers\Shit;


use App\Arduino\Connection\Contracts\DriverInterface;
use App\Arduino\Connection\Contracts\DriverResolverInterface;

class ShitDriverResolver implements DriverResolverInterface
{

    /**
     * @param string $dsn
     * @param array $options
     * @return DriverInterface
     */
    public function resolve(string $dsn, array $options = [])
    {
        dd($dsn);
    }
}