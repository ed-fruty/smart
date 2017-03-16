<?php
namespace src\SmartHome\Common\View\Traits;

use Fruty\SmartHome\Common\Http\Redirect\Aware\RedirectAware;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait JsonViewRedirect
{
    use RedirectAware;

    /**
     * @param $ajax
     * @param $notAjax
     * @param bool $isRedirect
     * @return JsonResponse|\Illuminate\Http\RedirectResponse|Response
     */
    public function whenAjax($ajax, $notAjax, $isRedirect = false)
    {
        return request()->ajax()
            ?   new JsonResponse($ajax)
            :   ($isRedirect    ?   $this->redirect->route($notAjax) : new Response($notAjax))
        ;
    }
}
