<?php
namespace Fruty\SmartHome\Exchange\Concern\Handlers;

use Fruty\SmartHome\Common\Events\Contracts\EventDispatcherAwareInterface;
use Fruty\SmartHome\Common\Events\Traits\EventDispatcherAware;
use Fruty\SmartHome\Exchange\Concern\Commands\CreateExchangeCommand;
use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeInterface;
use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeRepositoryAwareInterface;
use Fruty\SmartHome\Exchange\Concern\Events\ExchangeEvent;
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
        $exchange = $this->newExchange($command);

        $this->exchangeRepository->save($exchange);

        $this->eventDispatcher->dispatch(ExchangeEvent::EXCHANGE_WAS_CREATED, new ExchangeWasCreated($exchange));

        return $exchange;
    }

    /**
     * Create new read exchange instance from the command instance.
     *
     * @param CreateExchangeCommand $command
     * @return ExchangeInterface
     */
    private function newExchange(CreateExchangeCommand $command)
    {
        $emptyExchange = $this->exchangeRepository->getFactory()->createReadExchange();

        $writeExchange = $this->exchangeRepository->getFactory()->createWriteExchange($emptyExchange)
            ->setName($command->getName())
            ->setConnector($command->getConnector())
            ->setDsn($command->getDsn())
            ->setStatus($command->getStatus())
        ;

        return $writeExchange->getReadExchange();
    }
}
