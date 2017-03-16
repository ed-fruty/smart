<?php
namespace Fruty\SmartHome\Exchange\App\Actions\GetExchangeList;

use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeRepositoryAwareInterface;
use Fruty\SmartHome\Exchange\Concern\Traits\ExchangeRepositoryAware;

class GetExchangeListAction implements ExchangeRepositoryAwareInterface
{
    use ExchangeRepositoryAware;

    public const ROUTE_NAME = 'exchange.index';

    /**
     * @param GetExchangeListResponder $responder
     * @return \Illuminate\Http\Response
     */
    public function __invoke(GetExchangeListResponder $responder)
    {
        $collection = collect([]);// $this->exchangeRepository->matches();

        return $responder->getResponse($collection);
    }
}
