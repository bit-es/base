<?php

namespace Bites\Core\Resources\Menus\Tables;

use Bites\Core\Models\Menu;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Enums\TextSize;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
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
                Split::make([
                    ImageColumn::make('icon')
                        ->label('')
                        ->circular()
                        ->grow(false)
                        ->defaultImageUrl('https://raw.githubusercontent.com/bit-ecosystem/bites/refs/heads/main/menu/business-idea.svg'), // to chanage to Str::kebab($record->title)
                    Stack::make([
                        TextColumn::make('title')
                            ->label('Title')
                            // ->searchable()
                            ->color('primary'),
                        TextColumn::make('description')
                            ->size(TextSize::ExtraSmall)
                            ->wrap(),
                    ]),
                ]),
            ])
            ->paginated(false)
            ->contentGrid([
                'md' => 2,
                'xl' => 4,
            ])
            ->recordUrl(
                fn (Model $record): string => $record->internal_link && Route::has($record->internal_link)
                    ? route($record->internal_link)
                    : ($record->external_link ?? '#')
            )
            ->filters([
                //     SelectFilter::make('category')
                //         ->label('Category')
                //         ->options(
                //             fn() =>
                //             Menu::query()
                //                 ->select('category')
                //                 ->distinct()
                //                 ->pluck('category', 'category')
                //                 ->toArray()
                //         ),
                // ], layout: FiltersLayout::AboveContentCollapsible)
                // ->recordActions([
                //     // EditAction::make(),
            ])
            ->toolbarActions([
                // BulkActionGroup::make([
                // DeleteBulkAction::make(),
                // ]),
            ]);
    }
}
