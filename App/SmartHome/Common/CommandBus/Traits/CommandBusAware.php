<?php
namespace App\SmartHome\Common\CommandBus\Traits;

use Illuminate\Contracts\Bus\Dispatcher;

trait CommandBusAware
{
    /**
     * @var Dispatcher
     */
    protected $commandBus;

    /**
     * @param Dispatcher $commandBus
     */
    public function setCommandBus(Dispatcher $commandBus)
    {
        $this->commandBus = $commandBus;
    }
}
