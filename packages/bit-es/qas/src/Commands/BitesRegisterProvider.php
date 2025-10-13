<?php

namespace Bites\Qas\Commands;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class BitesRegisterProvider
{
    public static function addProvider()
    {
        ServiceProvider::addProviderToBootstrapFile(
            'Bites\\Qas\\Providers\\QasPanelProvider',
            App::getBootstrapProvidersPath()
        );
    }
}
