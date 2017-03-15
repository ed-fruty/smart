<?php
namespace Fruty\SmartHome\Exchange\Concern\Handlers;

use Fruty\SmartHome\Common\Events\Contracts\EventDispatcherAwareInterface;
use Fruty\SmartHome\Common\Events\Traits\EventDispatcherAware;
use Fruty\SmartHome\Common\Status\Status;
use Fruty\SmartHome\Exchange\Concern\Commands\UpdateExchangeCommand;
use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeRepositoryAwareInterface;
use Fruty\SmartHome\Exchange\Concern\Events\ExchangeWasUpdated;
use Fruty\SmartHome\Exchange\Concern\Traits\ExchangeRepositoryAware;

/**
 * Class UpdateExchangeHandler
 * @package Fruty\SmartHome\Exchange\Concern\Handlers
 */
class UpdateExchangeHandler implements ExchangeRepositoryAwareInterface, EventDispatcherAwareInterface
{
    use ExchangeRepositoryAware, EventDispatcherAware;

    /**
     * @param UpdateExchangeCommand $command
     * @return \App\SmartHome\Exchange\Concern\Contracts\ExchangeInterface
     */
    public function handle(UpdateExchangeCommand $command)
    {
        $exchange = $this->exchangeRepository->findOrFail($command->getExchangeId());

        $writeExchange = $this->exchangeRepository->getFactory()->createWriteExchange($exchange);
        $writeExchange->setName($command->getName());
        $writeExchange->setStatus(new Status($command->getStatus()));

        $this->exchangeRepository->save($writeExchange);

        $this->eventDispatcher->dispatch(new ExchangeWasUpdated($writeExchange->getReadExchange()));

        return $writeExchange->getReadExchange();
    }
}