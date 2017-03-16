<?php
namespace Fruty\SmartHome\Exchange\App\Actions\GetExchangeList;

use Fruty\SmartHome\Common\Http\Response\ResponseBuilder;
use Fruty\SmartHome\Exchange\App\Transformers\ExchangeResourceTransformer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

class GetExchangeListResponder
{

    const VIEW_NAME = 'exchange.index';
    /**
     * @var ResponseBuilder
     */
    private $responseBuilder;

    /**
     * GetExchangeListResponder constructor.
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(ResponseBuilder $responseBuilder)
    {
        $this->responseBuilder = $responseBuilder;
    }

    /**
     * @param Collection $collection
     * @return Response
     */
    public function getResponse($collection)
    {
        return $this->responseBuilder
            ->json($collection, new ExchangeResourceTransformer)
            ->template(self::VIEW_NAME, compact('collection'))
            ->build()
            ;
    }
}
