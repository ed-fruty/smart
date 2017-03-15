<?php
namespace App\SmartHome\Exchange\Concern\Handlers;

use App\SmartHome\Common\Events\Contracts\EventDispatcherAwareInterface;
use App\SmartHome\Common\Events\Traits\EventDispatcherAware;
use App\SmartHome\Common\Status\Status;
use App\SmartHome\Exchange\Concern\Commands\UpdateExchangeCommand;
use App\SmartHome\Exchange\Concern\Contracts\ExchangeRepositoryAwareInterface;
use App\SmartHome\Exchange\Concern\Events\ExchangeWasUpdated;
use App\SmartHome\Exchange\Concern\Traits\ExchangeRepositoryAware;

/**
 * Class UpdateExchangeHandler
 * @package App\SmartHome\Exchange\Concern\Handlers
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
