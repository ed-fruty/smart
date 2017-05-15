<?php

namespace App\ViewComposers;


use App\Arduino\Connection\ConnectionManager;
use Illuminate\Contracts\View\View;

class ArduinoDriversViewComposer
{
    /**
     * @var ConnectionManager
     */
    private $connectionManager;

    /**
     * ArduinoDriversViewComposer constructor.
     * @param ConnectionManager $connectionManager
     */
    public function __construct(ConnectionManager $connectionManager)
    {
        $this->connectionManager = $connectionManager;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('drivers', $this->makeDriversDropDown());
    }

    /**
     * @return array
     */
    private function makeDriversDropDown()
    {
        $list = [];

        foreach ($this->connectionManager->getConfig()->getAvailableDrivers() as $driver) {
            $list[$driver] = $driver;
        }

        return $list;
    }
}