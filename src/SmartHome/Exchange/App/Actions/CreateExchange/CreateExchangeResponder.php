<?php
namespace Fruty\SmartHome\Exchange\App\Actions\StoreExchange;

use Fruty\SmartHome\Common\Http\Redirect\Aware\RedirectAware;
use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class CreateExchangeResponder
{
    use RedirectAware;

    const REDIRECT_ROUTE = 'exchange.index';

    /**
     * @param ExchangeInterface $exchange
     * @return Response|RedirectResponse
     */
    public function getResponse(ExchangeInterface $exchange)
    {
        return $this->redirect->route(self::REDIRECT_ROUTE);
    }
}
