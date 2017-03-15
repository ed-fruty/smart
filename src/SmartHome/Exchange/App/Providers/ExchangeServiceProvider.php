<?php
namespace Fruty\SmartHome\Exchange\App\Providers;

use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeRepositoryAwareInterface;
use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeRepositoryInterface;
use Fruty\SmartHome\Exchange\Infrastructure\Eloquent\ExchangeRepository;
use Illuminate\Support\ServiceProvider;

class ExchangeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ExchangeRepositoryInterface::class, ExchangeRepository::class);
        $this->app->afterResolving(ExchangeRepositoryAwareInterface::class, $this->getRepositoryAwareCallback());
    }

    /**
     * @return \Closure
     */
    private function getRepositoryAwareCallback()
    {
        return function(ExchangeRepositoryAwareInterface $aware) {
            $repository = $this->app->make(ExchangeRepositoryInterface::class);
            $aware->setExchangeRepository($repository);
        };
    }
}
