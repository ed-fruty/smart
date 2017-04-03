<?php
namespace Fruty\SmartHome\Exchange\App\Actions\GetExchangeList;

use Fruty\SmartHome\Common\Specifications\PaginatedSpecification;
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
        $collection = $this->exchangeRepository->search(new PaginatedSpecification());

        return $responder->getResponse($collection);
    }
}
