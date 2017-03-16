<?php
namespace Fruty\SmartHome\Common\Http\Response;

use Fruty\SmartHome\Common\Http\Redirect\Aware\RedirectAware;
use Fruty\SmartHome\Common\Http\Redirect\Contracts\RedirectAwareInterface;
use Fruty\SmartHome\Common\View\Contracts\ViewFactoryAwareInterface;
use Fruty\SmartHome\Common\View\Traits\ViewFactoryAware;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use League\Fractal\Resource\Collection as FractalCollection;
use League\Fractal\Resource\Item;

/**
 * Class SmartResponse
 * @package Fruty\SmartHome\Common\Http\Response
 */
class ResponseBuilder implements RedirectAwareInterface, ViewFactoryAwareInterface
{
    use RedirectAware, ViewFactoryAware;

    const REDIRECT_TYPE_ROUTE = 'route';
    const REDIRECT_TYPE_ACTION = 'action';
    const REDIRECT_TYPE_URL = 'url';

    /**
     * @var mixed|array|callable|string
     */
    private $json;

    /**
     * @var array
     */
    private $view;

    /**
     * @var array
     */
    private $redirectData;


    /**
     * Set response params when ajax response.
     *
     * @param mixed|array|callable|string $ajax
     * @param null $transformer
     * @return $this
     */
    public function json($ajax, $transformer = null)
    {
        $this->json = compact('ajax', 'transformer');

        return $this;
    }

    /**
     * Set view data for response.
     *
     * @param string|callable $name
     * @param array $data
     * @return $this
     */
    public function template($name, array $data = [])
    {
        $this->view = compact('name', 'data');

        return $this;
    }

    /**
     * Set redirect params.
     *
     * @param string|callable $redirect
     * @param string $type
     */
    public function redirect($redirect, $type = self::REDIRECT_TYPE_ROUTE)
    {
        $this->redirectData = compact('redirect', 'type');
    }

    /**
     * @return JsonResponse|RedirectResponse|Response
     */
    public function build()
    {
        return request()->ajax()
            ?   $this->getAjaxResponse()
            :   ($this->redirectData    ?   $this->getRedirectResponse()    :   $this->getViewResponse())
            ;
    }

    /**
     * @return JsonResponse
     */
    private function getAjaxResponse()
    {
        $resource = $this->json['ajax'];

        if (is_object($this->json['transformer'])) {
            $resource = $this->json['ajax'] instanceof Collection
                ?   new FractalCollection($this->json['ajax'], $this->json['transformer'])
                :   new Item($this->json['ajax'], $this->json['transformer'])
            ;
        }
        return new JsonResponse($resource);
    }

    /**
     * @return RedirectResponse
     */
    private function getRedirectResponse()
    {
        switch ($this->redirectData['type']) {
            case self::REDIRECT_TYPE_ROUTE:
                return $this->redirect->route($this->redirectData['redirect']);
            default:
                return $this->redirect->to($this->redirectData['redirect']);
        }
    }

    /**
     * @return Response
     */
    private function getViewResponse()
    {
        return new Response(
            is_callable($this->view['name'])
                ?   call_user_func($this->view['name'], $this->view['data'])
                :   $this->viewFactory->make($this->view['name'], $this->view['data'])
        );
    }

}
