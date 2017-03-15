<?php
namespace App\SmartHome\Common\Http\Redirect\Aware;

use Illuminate\Routing\Redirector;

trait RedirectAware
{
    /**
     * @var Redirector
     */
    protected $redirect;

    /**
     * @param Redirector $redirect
     */
    public function setRedirect(Redirector $redirect)
    {
        $this->redirect = $redirect;
    }
}
