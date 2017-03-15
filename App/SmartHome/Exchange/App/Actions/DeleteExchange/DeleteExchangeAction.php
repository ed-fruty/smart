<?php
namespace App\SmartHome\Exchange\App\Actions\DeleteExchange;

use App\SmartHome\Common\CommandBus\Contracts\CommandBusAwareInterface;
use App\SmartHome\Common\CommandBus\Traits\CommandBusAware;
use App\SmartHome\Exchange\Concern\Contracts\ExchangeRepositoryAwareInterface;
use App\SmartHome\Exchange\Concern\Traits\ExchangeRepositoryAware;
use App\SmartHome\Exchange\Concern\ValueObjects\ExchangeId;

/**
 * Class DeleteExchangeAction
 * @package App\SmartHome\Exchange\App\Actions\DeleteExchange
 */
class DeleteExchangeAction implements ExchangeRepositoryAwareInterface, CommandBusAwareInterface
{
    use CommandBusAware, ExchangeRepositoryAware;

    /**
     * @param DeleteExchangeRequest $request
     * @param DeleteExchangeResponder $responder
     * @param $exchangeId
     * @return mixed
     */
    public function __invoke(DeleteExchangeRequest $request, DeleteExchangeResponder $responder, $exchangeId)
    {
        $exchange = $this->exchangeRepository->findOrFail(new ExchangeId($exchangeId));

        $this->commandBus->dispatch(new DeleteExchangeCommand($exchange));

        return $responder->getResponse($exchange);
    }
}
