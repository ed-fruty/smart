<?php
namespace Fruty\SmartHome\Exchange\App\Actions\GetExchangeList;

use Fruty\SmartHome\Common\View\Contracts\ViewFactoryAwareInterface;
use Fruty\SmartHome\Common\View\Traits\ViewFactoryAware;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

class GetExchangeListResponder implements ViewFactoryAwareInterface
{
    use ViewFactoryAware;

    const VIEW_NAME = 'exchange.index';

    /**
     * @param Collection $collection
     * @return Response
     */
    public function getResponse($collection)
    {
        return new Response(
            $this->viewFactory->make(self::VIEW_NAME, compact('collection'))
        );
    }
}
