<?php
namespace App\SmartHome\Exchange\App\Actions\StoreExchange;

use App\SmartHome\Common\CommandBus\Contracts\CommandBusAwareInterface;
use App\SmartHome\Common\CommandBus\Traits\CommandBusAware;
use App\SmartHome\Exchange\Concern\Commands\CreateExchangeCommand;

/**
 * Class StoreExchangeAction
 * @package App\SmartHome\Exchange\App\Actions\StoreExchange
 */
class CreateExchangeAction implements CommandBusAwareInterface
{
    use CommandBusAware;

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
