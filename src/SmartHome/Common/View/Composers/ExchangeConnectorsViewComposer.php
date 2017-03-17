<?php
namespace Fruty\SmartHome\Common\View\Composers;

use Fruty\SmartHome\Exchange\Concern\Connections\ConnectorAggregate;
use Illuminate\Contracts\View\View;

final class ExchangeConnectorsViewComposer
{
    /**
     * @var ConnectorAggregate
     */
    private $connectorAggregate;

    /**
     * ExchangeConnectionTypesViewComposer constructor.
     * @param ConnectorAggregate $connectionTypesList
     */
    public function __construct(ConnectorAggregate $connectorAggregate)
    {
        $this->connectorAggregate = $connectorAggregate;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('exchangeConnectorAggregate', $this->connectorAggregate);
    }
}
