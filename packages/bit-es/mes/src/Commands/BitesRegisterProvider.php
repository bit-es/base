<?php

namespace Bites\Mes\Commands;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class BitesRegisterProvider
{
    public static function addProvider()
    {
        ServiceProvider::addProviderToBootstrapFile(
            'Bites\\Mes\\Providers\\MesPanelProvider',
            App::getBootstrapProvidersPath()
        );
    }
}
