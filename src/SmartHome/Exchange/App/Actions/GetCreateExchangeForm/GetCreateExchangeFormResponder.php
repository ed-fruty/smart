<?php
namespace Fruty\SmartHome\Exchange\App\Actions\GetCreateExchangeForm;

use Fruty\SmartHome\Common\View\Contracts\ViewFactoryAwareInterface;
use Fruty\SmartHome\Common\View\Traits\ViewFactoryAware;
use Illuminate\Http\Response;

class GetCreateExchangeFormResponder implements ViewFactoryAwareInterface
{
    use ViewFactoryAware;

    public const VIEW_NAME = 'exchange.create';

    /**
     * @return Response
     */
    public function getResponse()
    {
        return new Response(
            $this->viewFactory->make(self::VIEW_NAME)
        );
    }
}
