<?php
namespace Fruty\SmartHome\Common\Providers;

use Fruty\SmartHome\Common\View\Composers\ExchangeConnectionTypesViewComposer;
use Fruty\SmartHome\Common\View\Composers\StatusViewComposer;
use Fruty\SmartHome\Exchange\App\Actions\EditExchange\EditExchangeResponder;
use Fruty\SmartHome\Exchange\App\Actions\GetCreateExchangeForm\GetCreateExchangeFormResponder;
use Illuminate\Support\ServiceProvider;

class ViewComposersServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->status();
        $this->exchangeConnectionTypes();
    }

    /**
     * Push view composer to assign status
     */
    private function status()
    {
        view()->composer([
            GetCreateExchangeFormResponder::VIEW_NAME,
            EditExchangeResponder::VIEW_NAME,

        ], StatusViewComposer::class);
    }

    /**
     * Push view composer to assign exchange connection types.
     */
    private function exchangeConnectionTypes()
    {
        view()->composer([
            GetCreateExchangeFormResponder::VIEW_NAME,

        ], ExchangeConnectionTypesViewComposer::class);
    }

}
