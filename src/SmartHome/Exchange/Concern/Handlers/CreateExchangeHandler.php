<?php
namespace Fruty\SmartHome\Exchange\Concern\Handlers;

use Fruty\SmartHome\Common\Events\Contracts\EventDispatcherAwareInterface;
use Fruty\SmartHome\Common\Events\Traits\EventDispatcherAware;
use Fruty\SmartHome\Exchange\Concern\Commands\CreateExchangeCommand;
use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeRepositoryAwareInterface;
use Fruty\SmartHome\Exchange\Concern\Events\ExchangeWasCreated;
use Fruty\SmartHome\Exchange\Concern\Traits\ExchangeRepositoryAware;

/**
 * Class CreateExchangeHandler
 * @package Fruty\SmartHome\Exchange\Concern\Handlers
 */
class CreateExchangeHandler implements EventDispatcherAwareInterface, ExchangeRepositoryAwareInterface
{
    use ExchangeRepositoryAware, EventDispatcherAware;

    /**
     * @param CreateExchangeCommand $command
     * @return \Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeInterface
     */
    public function handle(CreateExchangeCommand $command)
    {
        $exchange = $this->exchangeRepository->getFactory()->createReadExchange($command->toArray());

        $this->exchangeRepository->save($exchange);

        $this->eventDispatcher->dispatch(new ExchangeWasCreated($exchange));

        return $exchange;
    }
}
