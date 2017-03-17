<?php
namespace Fruty\SmartHome\Common\Providers;

use Fruty\SmartHome\Exchange\Concern\Commands\CreateExchangeCommand;
use Fruty\SmartHome\Exchange\Concern\Handlers\CreateExchangeHandler;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\ServiceProvider;

class CommandHandlerMapServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    private $map = [
        CreateExchangeCommand::class => CreateExchangeHandler::class
    ];

    /**
     *
     */
    public function register()
    {
        $this->app->afterResolving(Dispatcher::class, function(Dispatcher $dispatcher) {
            /** @var \Illuminate\Bus\Dispatcher $dispatcher */

            $dispatcher->map($this->map);
        });
    }
}
