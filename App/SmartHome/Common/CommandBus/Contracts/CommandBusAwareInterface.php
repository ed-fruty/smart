<?php
namespace App\SmartHome\Common\CommandBus\Contracts;

use Illuminate\Contracts\Bus\Dispatcher;

interface CommandBusAwareInterface
{
    /**
     * @param Dispatcher $commandBus
     */
    public function setCommandBus(Dispatcher $commandBus);
}
