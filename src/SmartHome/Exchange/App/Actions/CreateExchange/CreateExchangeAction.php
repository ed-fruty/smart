<?php
namespace Fruty\SmartHome\Exchange\App\Actions\CreateExchange;

use Fruty\SmartHome\Common\CommandBus\Contracts\CommandBusAwareInterface;
use Fruty\SmartHome\Common\CommandBus\Traits\CommandBusAware;
use Fruty\SmartHome\Common\Status\Status;
use Fruty\SmartHome\Exchange\Concern\Commands\CreateExchangeCommand;
use Fruty\SmartHome\Exchange\Concern\Connections\ConnectorAggregate;

/**
 * Class StoreExchangeAction
 * @package Fruty\SmartHome\Exchange\App\Actions\StoreExchange
 */
class CreateExchangeAction implements CommandBusAwareInterface
{
    use CommandBusAware;

    public const ROUTE_NAME = 'exchange.store';

    /**
     * @var ConnectorAggregate
     */
    private $connectorAggregate;

    /**
     * CreateExchangeAction constructor.
     * @param ConnectorAggregate $connectorAggregate
     */
    public function __construct(ConnectorAggregate $connectorAggregate)
    {
        $this->connectorAggregate = $connectorAggregate;
    }

    /**
     * @param CreateExchangeRequest $request
     * @param CreateExchangeResponder $responder
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function __invoke(CreateExchangeRequest $request, CreateExchangeResponder $responder)
    {
        $command = $this->createExchangeCommand($request);

        $exchange = $this->commandBus->dispatch($command);

        return $responder->getResponse($exchange);
    }

    /**
     * @param CreateExchangeRequest $request
     * @return CreateExchangeCommand
     */
    private function createExchangeCommand(CreateExchangeRequest $request)
    {
        return new CreateExchangeCommand(
            (string) $request->get('name'),
            $this->connectorAggregate->get($request->get('connector')),
            (string) $request->get('dsn'),
            new Status($request->get('status'))
        );
    }
}
