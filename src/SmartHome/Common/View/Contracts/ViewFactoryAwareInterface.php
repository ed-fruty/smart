<?php
namespace Fruty\SmartHome\Common\View\Contracts;

use Illuminate\Contracts\View\Factory;

interface ViewFactoryAwareInterface
{
    /**
     * @param Factory $viewFactory
     */
    public function setViewFactory(Factory $viewFactory);
}
