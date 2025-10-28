<?php

namespace Bites\Core\Resources\Menus\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class MenuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('category')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                FileUpload::make('icon'),
                Textarea::make('description')
                    ->columnSpanFull(),
                Select::make('internal_link')
                    ->label('Internal Route')
                    ->options(function () {
                        // Cache routes to avoid rescanning
                        return cache()->remember('internal_route_list', 3600, function () {
                            return collect(Route::getRoutes())
                                ->mapWithKeys(function ($route) {
                                    $name = $route->getName();
                                    if (! $name) {
                                        return [];
                                    }
                                    if (! Str::startsWith($name, ['filament.', 'app.'])) {
                                        return [];
                                    }

                                    return [$name => $name];
                                })
                                ->sort()
                                ->toArray();
                        });
                    }),
                TextInput::make('external_link'),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
