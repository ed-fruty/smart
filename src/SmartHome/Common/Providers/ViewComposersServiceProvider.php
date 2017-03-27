<?php
namespace Fruty\SmartHome\Common\Providers;

use Fruty\SmartHome\Common\View\Composers\ExchangeConnectorsViewComposer;
use Fruty\SmartHome\Common\View\Composers\StatusViewComposer;
use Fruty\SmartHome\Exchange\App\Actions\EditExchange\EditExchangeResponder;
use Fruty\SmartHome\Exchange\App\Actions\GetCreateExchangeForm\GetCreateExchangeFormResponder;
use Fruty\SmartHome\Exchange\App\Actions\GetExchangeEditForm\GetExchangeEditFormResponder;
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
            GetExchangeEditFormResponder::VIEW_NAME,

        ], StatusViewComposer::class);
    }

    /**
     * Push view composer to assign exchange connection types.
     */
    private function exchangeConnectionTypes()
    {
        view()->composer([
            GetCreateExchangeFormResponder::VIEW_NAME,
            GetExchangeEditFormResponder::VIEW_NAME,

        ], ExchangeConnectorsViewComposer::class);
    }

}
