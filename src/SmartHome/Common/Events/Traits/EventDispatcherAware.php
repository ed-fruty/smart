<?php
namespace Fruty\SmartHome\Common\Events\Traits;

use Illuminate\Contracts\Events\Dispatcher;

trait EventDispatcherAware
{
    /**
     * @var Dispatcher
     */
    protected $eventDispatcher;

    /**
     * @param Dispatcher $eventDispatcher
     */
    public function setEventDispatcher(Dispatcher $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }
}
