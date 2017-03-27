<?php
namespace Fruty\SmartHome\Exchange\App\Actions\GetExchangeEditForm;

use Fruty\SmartHome\Common\View\Contracts\ViewFactoryAwareInterface;
use Fruty\SmartHome\Common\View\Traits\ViewFactoryAware;
use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeInterface;
use Illuminate\Http\Response;

class GetExchangeEditFormResponder implements ViewFactoryAwareInterface
{
    use ViewFactoryAware;

    const VIEW_NAME = 'exchange.edit';

    /**
     * @param ExchangeInterface|null $exchange
     * @return Response
     */
    public function getResponse(ExchangeInterface $exchange)
    {
        return new Response(
              $this->viewFactory->make(self::VIEW_NAME, compact('exchange'))
        );
    }
}
