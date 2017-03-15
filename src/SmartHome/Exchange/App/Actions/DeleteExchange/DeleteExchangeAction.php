<?php
namespace Fruty\SmartHome\Exchange\App\Actions\DeleteExchange;

use Fruty\SmartHome\Common\CommandBus\Contracts\CommandBusAwareInterface;
use Fruty\SmartHome\Common\CommandBus\Traits\CommandBusAware;
use Fruty\SmartHome\Exchange\Concern\Commands\DeleteExchangeCommand;
use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeRepositoryAwareInterface;
use Fruty\SmartHome\Exchange\Concern\Traits\ExchangeRepositoryAware;
use Fruty\SmartHome\Exchange\Concern\ValueObjects\ExchangeId;

/**
 * Class DeleteExchangeAction
 * @package Fruty\SmartHome\Exchange\App\Actions\DeleteExchange
 */
class DeleteExchangeAction implements CommandBusAwareInterface
{
    use CommandBusAware;

    /**
     * @param DeleteExchangeRequest $request
     * @param DeleteExchangeResponder $responder
     * @param $exchangeId
     * @return mixed
     */
    public function __invoke(DeleteExchangeRequest $request, DeleteExchangeResponder $responder, $exchangeId)
    {
        $command = new DeleteExchangeCommand(new ExchangeId($exchangeId));

        $this->commandBus->dispatch($command);

        return $responder->getResponse();
    }
}
