<?php
namespace App\SmartHome\Exchange\App\Actions\UpdateExchange;

use App\SmartHome\Common\CommandBus\Contracts\CommandBusAwareInterface;
use App\SmartHome\Common\CommandBus\Traits\CommandBusAware;
use Illuminate\Http\Response;

class UpdateExchangeAction implements CommandBusAwareInterface
{
    use CommandBusAware;

    /**
     * @param UpdateExchangeRequest $request
     * @param UpdateExchangeResponder $responder
     * @return Response
     */
    public function __invoke(UpdateExchangeRequest $request, UpdateExchangeResponder $responder)
    {
        $command = new UpdateExchangeCommand(
            $request->getExchangeId(),
            $request->getName(),
            $request->getTypeId(),
            $request->getStatus()
        );

        $exchange = $this->commandBus->dispatch($command);

        return $responder->getResponse($exchange);
    }
}
