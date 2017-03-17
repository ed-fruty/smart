<?php

namespace Fruty\SmartHome\Common\Providers;

use Fruty\SmartHome\Common\CommandBus\Contracts\CommandBusAwareInterface;
use Fruty\SmartHome\Common\Events\Contracts\EventDispatcherAwareInterface;
use Fruty\SmartHome\Common\Http\Redirect\Contracts\RedirectAwareInterface;
use Fruty\SmartHome\Common\Http\Response\ResponseBuilder;
use Fruty\SmartHome\Common\View\Contracts\ViewFactoryAwareInterface;
use Illuminate\Contracts\Bus\Dispatcher as CommandBus;
use Illuminate\Contracts\Events\Dispatcher as EventDispatcher;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Routing\Redirector;
use Illuminate\Support\ServiceProvider;
use src\SmartHome\Common\Http\Response\Contracts\ResponseBuilderAwareInterface;

class AwareServiceProvider extends ServiceProvider
{

    protected function getAwares()
    {
        return [
            CommandBusAwareInterface::class => [
                'make'		=> CommandBus::class,
                'setter'	=> 'setCommandBus'
            ],
            EventDispatcherAwareInterface::class => [
                'make'		=> EventDispatcher::class,
                'setter'	=> 'setEventDispatcher'
            ],
            RedirectAwareInterface::class => [
                'make'		=> Redirector::class,
                'setter'	=> 'setRedirect'
            ],
            ViewFactoryAwareInterface::class => [
                'make'		=> ViewFactory::class,
                'setter'	=> 'setViewFactory'
            ],
            ResponseBuilderAwareInterface::class => [
                'make'      => ResponseBuilder::class,
                'setter'    => 'setResponseBuilder',
            ],
        ];
    }

	public function register()
	{
		foreach ($this->getAwares() as $interface => $options) {

			$callback = $options['callback'] ?? function($aware) use ($options) {
				
				$dependency = $this->app->make($options['make']);

				$aware->{$options['setter']}($dependency);
			};

			$this->app->afterResolving($interface, $callback);
		}
		
	}

}