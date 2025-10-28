<?php

namespace Bites\Core;

use BladeUI\Icons\Factory;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use SocialiteProviders\Keycloak\Provider as KeycloakProvider;
use SocialiteProviders\Manager\SocialiteWasCalled;

class CoreServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // dump('CoreServiceProvider booted');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'bites');
        $this->callAfterResolving(Factory::class, function (Factory $factory) {
            $factory->add('myicons', [
                'path' => __DIR__.'/../resources/svg',
                'prefix' => 'myicon',
            ]);
        });

        Event::listen(SocialiteWasCalled::class, function (SocialiteWasCalled $event) {
            $event->extendSocialite('keycloak', KeycloakProvider::class);
        });

    }

    public function register()
    {
        // dump('CoreServiceProvider registered');
        $this->mergeConfigFrom(__DIR__.'/../config/bites.php', 'bites');
        $this->commands([
            // BitesExportCommand::class,
            Commands\BitesSeedCommand::class,
            Commands\BitesRegisterProvider::class,
            Commands\BitesModel::class,
        ]);
    }
}
