<?php

namespace Bites\Eam\Commands;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class BitesRegisterProvider
{
    public static function addProvider()
    {
        ServiceProvider::addProviderToBootstrapFile(
            'Bites\\Eam\\Providers\\EamPanelProvider',
            App::getBootstrapProvidersPath()
        );
    }
}
