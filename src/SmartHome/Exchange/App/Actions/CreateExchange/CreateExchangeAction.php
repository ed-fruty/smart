<?php
namespace Fruty\SmartHome\Exchange\App\Actions\CreateExchange;

use Fruty\SmartHome\Common\CommandBus\Contracts\CommandBusAwareInterface;
use Fruty\SmartHome\Common\CommandBus\Traits\CommandBusAware;
use Fruty\SmartHome\Exchange\Concern\Commands\CreateExchangeCommand;

/**
 * Class StoreExchangeAction
 * @package Fruty\SmartHome\Exchange\App\Actions\StoreExchange
 */
class CreateExchangeAction implements CommandBusAwareInterface
{
    use CommandBusAware;

    public const ROUTE_NAME = 'exchange.store';

    /**
     * @param CreateExchangeRequest $request
     * @param CreateExchangeResponder $responder
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function __invoke(CreateExchangeRequest $request, CreateExchangeResponder $responder)
    {
        $command = new CreateExchangeCommand(
            $request->getName(),
            $request->getTypeId(),
            $request->getStatus()
        );

        $exchange = $this->commandBus->dispatch($command);

        return $responder->getResponse($exchange);
    }
}
