<?php

namespace App\ViewComposers;


use App\Common\Status\Status;
use Illuminate\Contracts\View\View;

class StatusViewComposer
{
    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('status', Status::dropDown());
    }
}