<?php

namespace App\Arduino\Connection\Drivers\Shit;


use App\Arduino\Connection\Contracts\DriverInterface;

class ShitSerialDriver implements DriverInterface
{

    /**
     * @param $payload
     */
    public function send($payload)
    {
       dd($payload);
    }

    /**
     * @param $payload
     * @param callable $callback
     * @return mixed
     */
    public function wait($payload, callable $callback)
    {
        dd($payload);
    }
}