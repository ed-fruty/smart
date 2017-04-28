<?php

namespace App\Arduino\Connection\Contracts;

interface DriverInterface
{
    /**
     * @param $payload
     */
    public function send($payload);

    /**
     * @param $payload
     * @param callable $callback
     * @return mixed
     */
    public function wait($payload, callable $callback);
}
