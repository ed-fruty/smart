<?php
namespace Fruty\SmartHome\Exchange\App\Actions\GetCreateExchangeForm;

class GetCreateExchangeFormAction
{
    /**
     * @param GetCreateExchangeFormResponder $responder
     * @return \Illuminate\Http\Response
     */
    public function __invoke(GetCreateExchangeFormResponder $responder)
    {
        return $responder->getResponse();
    }
}
