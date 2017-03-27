<?php
namespace Fruty\SmartHome\Exchange\App\Actions\GetExchangeEditForm;

use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeRepositoryAwareInterface;
use Fruty\SmartHome\Exchange\Concern\Traits\ExchangeRepositoryAware;
use Fruty\SmartHome\Exchange\Concern\ValueObjects\ExchangeId;

class GetExchangeEditFormAction implements ExchangeRepositoryAwareInterface
{
    use ExchangeRepositoryAware;

    public const ROUTE_NAME = 'exchange.edit';

    /**
     * @param GetExchangeEditFormRequest $request
     * @param GetExchangeEditFormResponder $responder
     * @param $exchangeId
     * @return \Illuminate\Http\Response
     */
    public function __invoke(GetExchangeEditFormRequest $request, GetExchangeEditFormResponder $responder, $exchangeId)
    {
        $exchange = $this->exchangeRepository->findOrFail(new ExchangeId($exchangeId));

        return $responder->getResponse($exchange);
    }
}
