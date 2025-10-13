<?php

namespace Bites\Erp\Commands;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class BitesRegisterProvider
{
    public static function addProvider()
    {
        ServiceProvider::addProviderToBootstrapFile(
            'Bites\\Erp\\Providers\\ErpPanelProvider',
            App::getBootstrapProvidersPath()
        );
    }
}
