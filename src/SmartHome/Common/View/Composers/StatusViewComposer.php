<?php
namespace Fruty\SmartHome\Common\View\Composers;

use Fruty\SmartHome\Common\Status\Status;
use Illuminate\Contracts\View\View;

final class StatusViewComposer
{
    /**
     * @var Status
     */
    private $status;

    /**
     * StatusViewComposer constructor.
     * @param Status $status
     */
    public function __construct(Status $status)
    {
        $this->status = $status;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('status', $this->status);
    }
}
