<?php
namespace Fruty\SmartHome\Exchange\App\Actions\UpdateExchange;

use Fruty\SmartHome\Common\CommandBus\Contracts\CommandBusAwareInterface;
use Fruty\SmartHome\Common\CommandBus\Traits\CommandBusAware;
use Fruty\SmartHome\Exchange\Concern\Commands\UpdateExchangeCommand;
use Fruty\SmartHome\Exchange\Concern\ValueObjects\ExchangeId;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class UpdateExchangeAction implements CommandBusAwareInterface
{
    use CommandBusAware;

    /**
     * @param UpdateExchangeRequest $request
     * @param UpdateExchangeResponder $responder
     * @param $exchangeId
     * @return Response|RedirectResponse
     */
    public function __invoke(UpdateExchangeRequest $request, UpdateExchangeResponder $responder, $exchangeId)
    {
        $command = new UpdateExchangeCommand(
            new ExchangeId($exchangeId),
            $request->get('name'),
            $request->get('type_id'),
            $request->get('status')
        );

        $exchange = $this->commandBus->dispatch($command);

        return $responder->getResponse($exchange);
    }
}
