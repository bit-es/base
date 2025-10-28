<?php

namespace Bites\Core\Resources\Menus\Tables;

use Bites\Core\Models\Menu;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class MenusTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('icon')
                    ->label('')
                    ->circular()
                    ->defaultImageUrl('https://raw.githubusercontent.com/bit-ecosystem/bites/refs/heads/main/menu/business-idea.svg'),
                // ->visible(fn($record) => $record?->icon_type === 'svg'),
                // IconColumn::make('icon')
                //      ->icon(fn($record) => $record?->icon_type === 'svg' ? $record->icon : null)
                //     // ->visible(fn($record) => $record?->icon_type === 'svg')
                //     ->label(''),

                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('debug')
                    ->label('Debug')
                    ->getStateUsing(fn ($record) => $record?->icon_type === 'svg' ? Str::kebab($record->title) : null),

                TextColumn::make('description')
                    ->limit(80)
                    ->wrap(),
                TextColumn::make('internal_link')
                    ->searchable()
                    ->sortable(),
            ])
            // ->recordUrl(
            //     fn(Menu $record) =>
            //     $record->internal_link && Route::has($record->internal_link)
            //         ? route($record->internal_link, $record->id ?? null)
            //         : $record->external_link,
            //     shouldOpenInNewTab: fn(Menu $record) => blank($record->internal_link)
            // )

            ->recordUrl(
                fn (Model $record): string => $record->internal_link && Route::has($record->internal_link)
                    ? route($record->internal_link)
                    : ($record->external_link ?? '#')
            )

            // ->defaultSort('title')

            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
