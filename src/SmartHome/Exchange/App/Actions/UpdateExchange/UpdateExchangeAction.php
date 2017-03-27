<?php
namespace Fruty\SmartHome\Exchange\App\Actions\UpdateExchange;

use Fruty\SmartHome\Common\CommandBus\Contracts\CommandBusAwareInterface;
use Fruty\SmartHome\Common\CommandBus\Traits\CommandBusAware;
use Fruty\SmartHome\Common\Status\Status;
use Fruty\SmartHome\Exchange\Concern\Commands\UpdateExchangeCommand;
use Fruty\SmartHome\Exchange\Concern\Connections\ConnectorAggregate;
use Fruty\SmartHome\Exchange\Concern\ValueObjects\Dsn;
use Fruty\SmartHome\Exchange\Concern\ValueObjects\ExchangeId;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class UpdateExchangeAction implements CommandBusAwareInterface
{
    use CommandBusAware;

    public const ROUTE_NAME = 'exchange.update';
    /**
     * @var ConnectorAggregate
     */
    private $connectorAggregate;

    /**
     * UpdateExchangeAction constructor.
     * @param ConnectorAggregate $connectorAggregate
     */
    public function __construct(ConnectorAggregate $connectorAggregate)
    {
        $this->connectorAggregate = $connectorAggregate;
    }

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
            $this->connectorAggregate->get($request->get('connector')),
            new Dsn($request->get('dsn')),
            new Status($request->get('status'))
        );

        $exchange = $this->commandBus->dispatch($command);

        return $responder->getResponse($exchange);
    }
}
