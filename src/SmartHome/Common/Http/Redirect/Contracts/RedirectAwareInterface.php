<?php
namespace Fruty\SmartHome\Common\Http\Redirect\Contracts;

use Illuminate\Routing\Redirector;

interface RedirectAwareInterface
{
    /**
     * @param Redirector $redirect
     */
    public function setRedirect(Redirector $redirect);
}
