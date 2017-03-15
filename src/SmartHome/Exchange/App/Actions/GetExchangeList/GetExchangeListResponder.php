<?php
namespace Fruty\SmartHome\Exchange\App\Actions\GetExchangeList;

use Fruty\SmartHome\Common\View\Contracts\ViewFactoryAwareInterface;
use Fruty\SmartHome\Common\View\Traits\ViewFactoryAware;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
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
        return $this->whenAjax(
            $collection, 
            $this->viewFactory->make(self::VIEW_NAME, compact('collection'))
        );
    }

    private function whenAjax($ajax, $notAjax, $isRedirect = false)
    {
        return request()->ajax()
            ?   new JsonResponse($ajax)
            :   ($isRedirect ? new RedirectResponse($notAjax) : new Response($notAjax))
        ;    
    }
}
