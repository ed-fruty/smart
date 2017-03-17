<?php
namespace Fruty\SmartHome\Exchange\App\Actions\CreateExchange;

use Fruty\SmartHome\Common\CommandBus\Contracts\CommandBusAwareInterface;
use Fruty\SmartHome\Common\CommandBus\Traits\CommandBusAware;
use Fruty\SmartHome\Common\Status\Status;
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
     * @var ExchangeConnectionManager
     */
    private $exchangeConnectionManager;
    /**
     * @var Status
     */
    private $status;

    /**
     * CreateExchangeAction constructor.
     * @param ExchangeConnectionManager $exchangeConnectionManager
     * @param Status $status
     */
    public function __construct(ExchangeConnectionManager $exchangeConnectionManager, Status $status)
    {
        $this->exchangeConnectionManager = $exchangeConnectionManager;
        $this->status = $status;
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
            $this->exchangeConnectionManager->get($request->get('connection_type_id')),
            $this->status->fromValue($request->get('status'))
        );
    }
}
