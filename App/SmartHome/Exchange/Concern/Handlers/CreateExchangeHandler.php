<?php
namespace App\SmartHome\Exchange\Concern\Handlers;

use App\SmartHome\Common\Events\Contracts\EventDispatcherAwareInterface;
use App\SmartHome\Common\Events\Traits\EventDispatcherAware;
use App\SmartHome\Exchange\Concern\Commands\CreateExchangeCommand;
use App\SmartHome\Exchange\Concern\Contracts\ExchangeRepositoryAwareInterface;
use App\SmartHome\Exchange\Concern\Events\ExchangeWasCreated;
use App\SmartHome\Exchange\Concern\Traits\ExchangeRepositoryAware;

/**
 * Class CreateExchangeHandler
 * @package App\SmartHome\Exchange\Concern\Handlers
 */
class CreateExchangeHandler implements EventDispatcherAwareInterface, ExchangeRepositoryAwareInterface
{
    use ExchangeRepositoryAware, EventDispatcherAware;

    /**
     * @param CreateExchangeCommand $command
     * @return \App\SmartHome\Exchange\Concern\Contracts\ExchangeInterface
     */
    public function handle(CreateExchangeCommand $command)
    {
        $exchange = $this->exchangeRepository->getFactory()->createReadExchange($command->toArray());

        $this->exchangeRepository->save($exchange);

        $this->eventDispatcher->dispatch(new ExchangeWasCreated($exchange));

        return $exchange;
    }
}
