<?php

namespace Bites\Core;

use Bites\Core\Commands;
use Bites\Core\Filament\Resources;
use Filament\Facades\Filament;
use Illuminate\Console\Command;
use BladeUI\Icons\Factory;
use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // dump('CoreServiceProvider booted');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'bites');
        $this->callAfterResolving(Factory::class, function (Factory $factory) {
            $factory->add('myicons', [
                'path' => __DIR__ . '/../resources/svg',
                'prefix' => 'myicon',
            ]);
        });
    }
    public function register()
    {
        // dump('CoreServiceProvider registered');
        $this->mergeConfigFrom(__DIR__ . '/../config/bites.php', 'bites');
        $this->commands([
            // BitesExportCommand::class,
            Commands\BitesSeedCommand::class,
            Commands\BitesRegisterProvider::class,
            Commands\BitesModel::class,
        ]);
    }
}
