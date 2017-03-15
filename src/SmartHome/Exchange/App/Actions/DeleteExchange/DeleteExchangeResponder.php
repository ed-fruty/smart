<?php
namespace Fruty\SmartHome\Exchange\App\Actions\DeleteExchange;

use Fruty\SmartHome\Common\Http\Redirect\Aware\RedirectAware;
use Fruty\SmartHome\Common\Http\Redirect\Contracts\RedirectAwareInterface;
use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeInterface;
use Fruty\SmartHome\Exchange\Concern\ValueObjects\ExchangeId;
use Illuminate\Http\JsonResponse;

class DeleteExchangeResponder implements RedirectAwareInterface
{
    use RedirectAware;

    const REDIRECT_ROUTE = 'exchange.index';

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getResponse()
    {
        return $this->redirect->route(self::REDIRECT_ROUTE);
    }
}
