<?php

namespace Bites\Core\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class BitesRegisterProvider extends Command
{
    protected $signature = 'bites:register-panel {package} {provider}';

    protected $description = 'Register a single panel provider from a given package into the bootstrap file';

    public function handle()
    {
        $package = $this->argument('package');
        $provider = $this->argument('provider');

        $qualified = "Bites\\{$package}\\Providers\\{$provider}";

        ServiceProvider::addProviderToBootstrapFile(
            $qualified,
            App::getBootstrapProvidersPath()
        );

        $this->info("Registered: {$qualified}");
    }
}
