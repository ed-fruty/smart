<?php
namespace App\SmartHome\Common\View\Traits;

use Illuminate\Contracts\View\Factory;

trait ViewFactoryAware
{
    /**
     * @var Factory
     */
    protected $viewFactory;

    /**
     * @param Factory $viewFactory
     */
    public function setViewFactory(Factory $viewFactory)
    {
        $this->viewFactory = $viewFactory;
    }
}
