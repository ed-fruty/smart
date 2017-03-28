<?php
namespace Fruty\SmartHome\Exchange\App\Actions\DeleteExchange;

use Fruty\SmartHome\Common\Http\Redirect\Aware\RedirectAware;
use Fruty\SmartHome\Common\Http\Redirect\Contracts\RedirectAwareInterface;
use Fruty\SmartHome\Common\Http\Response\Contracts\ResponseBuilderAwareInterface;
use Fruty\SmartHome\Common\Http\Response\Traits\ResponseBuilderAware;
use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeInterface;
use Fruty\SmartHome\Exchange\Concern\ValueObjects\ExchangeId;
use Illuminate\Http\JsonResponse;

class DeleteExchangeResponder implements ResponseBuilderAwareInterface
{
    use ResponseBuilderAware;

    const REDIRECT_ROUTE = 'exchange.index';

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getResponse()
    {
        return $this->responseBuilder
            ->json(true)
            ->flash('Exchange was deleted.')
            ->redirect(DeleteExchangeAction::ROUTE_NAME)
            ->build();
    }
}
