<?php

namespace Bites\Dms\Commands;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class BitesRegisterProvider
{
    public static function addProvider()
    {
        ServiceProvider::addProviderToBootstrapFile(
            'Bites\\Dms\\Providers\\DmsPanelProvider',
            App::getBootstrapProvidersPath()
        );
    }
}
