<?php
namespace Fruty\SmartHome\Exchange\App\Actions\UpdateExchange;

use Fruty\SmartHome\Common\Http\Redirect\Aware\RedirectAware;
use Fruty\SmartHome\Common\Http\Redirect\Contracts\RedirectAwareInterface;
use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeInterface;

class UpdateExchangeResponder implements RedirectAwareInterface
{
    use RedirectAware;

    private const REDIRECT_ROUTE = 'exchange.index';

    /**
     * @param ExchangeInterface $exchange
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getResponse(ExchangeInterface $exchange)
    {
        return $this->redirect->route(self::REDIRECT_ROUTE);
    }
}
