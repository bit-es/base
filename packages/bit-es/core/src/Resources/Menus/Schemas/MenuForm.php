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
                        return cache()->remember('internal_route_list', 3600, function () {
                            return collect(Route::getRoutes())
                                ->mapWithKeys(function ($route) {
                                    $name = $route->getName();

                                    if (! $name) {
                                        return [];
                                    }

                                    // Only include routes starting with filament. or app.
                                    if (! Str::startsWith($name, ['filament.', 'app.'])) {
                                        return [];
                                    }

                                    // Exclude routes ending with .login, .logout, .edit
                                    if (Str::endsWith($name, ['.login', '.logout', '.edit'])) {
                                        return [];
                                    }

                                    // Truncate filament. prefix
                                    $label = Str::startsWith($name, 'filament.')
                                        ? Str::after($name, 'filament.')
                                        : $name;

                                    return [$name => $label];
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
