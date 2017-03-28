<?php

namespace Fruty\SmartHome\Exchange\Concern\Handlers;

use Fruty\SmartHome\Common\Events\Contracts\EventDispatcherAwareInterface;
use Fruty\SmartHome\Common\Events\Traits\EventDispatcherAware;
use Fruty\SmartHome\Exchange\Concern\Commands\DeleteExchangeCommand;
use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeRepositoryAwareInterface;
use Fruty\SmartHome\Exchange\Concern\Events\ExchangeWasDeleted;
use Fruty\SmartHome\Exchange\Concern\Traits\ExchangeRepositoryAware;

class DeleteExchangeHandler implements ExchangeRepositoryAwareInterface, EventDispatcherAwareInterface
{
    use ExchangeRepositoryAware, EventDispatcherAware;

    /**
     * @param DeleteExchangeCommand $command
     * @return bool
     */
    public function handle(DeleteExchangeCommand $command)
    {
        $exchange = $this->exchangeRepository->findOrFail($command->getExchangeId());

        $this->exchangeRepository->remove($exchange);

        $this->eventDispatcher->dispatch(new ExchangeWasDeleted($exchange));

        return true;
    }
}
