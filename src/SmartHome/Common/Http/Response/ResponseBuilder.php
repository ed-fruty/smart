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

    public const FORCE_AJAX = 'ajax';
    public const FORCE_REDIRECT = 'redirect';
    public const FORCE_VIEW = 'view';

    public const FLASH_LEVEL_INFO = 'info';
    public const FLASH_LEVEL_WARNING = 'warning';
    public const FLASH_LEVEL_DANGER = 'danger';
    public const FLASH_LEVEL_SUCCESS = 'success';

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
     * @var
     */
    private $flash = [];


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
     * @return $this
     */
    public function redirect($redirect, $type = self::REDIRECT_TYPE_ROUTE)
    {
        $this->redirectData = compact('redirect', 'type');

        return $this;
    }

    /**
     * @param $message
     * @param string $level
     * @param array $params
     * @return $this
     */
    public function flash($message, $level = self::FLASH_LEVEL_INFO, array $params = [])
    {
        $this->flash = compact('message', 'level', 'params');

        return $this;
    }

    /**
     * @param int $force
     * @return JsonResponse|RedirectResponse|Response
     */
    public function build($force = null)
    {
        if (! $force) {
            if (request()->ajax()) {
                $force = static::FORCE_AJAX;
            } else {
                $force = $this->redirectData ? static::FORCE_REDIRECT : static::FORCE_VIEW;
            }
        }

        switch ($force) {
            case static::FORCE_AJAX:
                return $this->getAjaxResponse();
            case static::FORCE_REDIRECT:
                $this->setFlashes();
                return $this->getRedirectResponse();
            case static::FORCE_VIEW:
                $this->setFlashes();
                return $this->getViewResponse();

            default:
                throw new \RuntimeException(sprintf("Undefined build option %s", $force));
        }
    }

    /**
     *
     */
    private function setFlashes()
    {
        if ($this->flash) {
            session()->flash('flash.message', trans($this->flash['message'], $this->flash['params']));
            session()->flash('flash.level', $this->flash['level']);
        }
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
