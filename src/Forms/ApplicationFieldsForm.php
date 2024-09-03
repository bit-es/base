<?php

namespace Bites\Base\Forms;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;


class ApplicationFieldsForm
{
    public static function get(): array
    {
        return [
            Grid::make()
                ->schema([
                    Section::make([
                        TextInput::make('site_name')
                            ->label(__('base::default.site_name'))
                            ->autofocus()
                            ->columnSpanFull(),
                        Textarea::make('site_description')
                            ->label(__('base::default.site_description'))
                            ->columnSpanFull(),
                        Grid::make()->schema([
                            FileUpload::make('site_logo')
                                ->label(fn() => __('base::default.site_logo'))
                                ->image()
                                ->directory('assets')
                                ->visibility('public')
                                ->moveFiles()
                                ->imageEditor()
                                ->getUploadedFileNameForStorageUsing(fn() => 'site_logo.png')
                                ->columnSpan(2),
                            FileUpload::make('site_favicon')
                                ->label(fn() => __('base::default.site_favicon'))
                                ->image()
                                ->directory('assets')
                                ->visibility('public')
                                ->moveFiles()
                                ->getUploadedFileNameForStorageUsing(fn() => 'site_favicon.ico')
                                ->acceptedFileTypes(['image/x-icon', 'image/vnd.microsoft.icon'])
                                ->columnSpan(2),
                        ])
                            //  ->columns(4)
                            ->visible(fn() => config('base.show_logo_and_favicon')),
                        TextInput::make('support_email')
                            ->label(__('base::default.support_email'))
                            ->prefixIcon('heroicon-o-envelope'),
                        TextInput::make('support_phone')
                            ->prefixIcon('heroicon-o-phone')
                            ->label(__('base::default.support_phone')),
                    ])
                ])
                ->columnSpan(['lg' => 2]),
            Grid::make()
                ->schema([
                    Section::make([
                        ColorPicker::make('p_color')
                            ->label(__('base::default.p_color'))
                            ->prefixIcon('heroicon-o-swatch')
                            ->formatStateUsing(fn(?string $state): string => $state ?? config('filament.theme.colors.primary'))
                            ->helperText(__('base::default.p_color_helper_text')),
                        ColorPicker::make('g_color')
                            ->label(__('base::default.g_color'))
                            ->prefixIcon('heroicon-o-swatch')
                            ->formatStateUsing(fn(?string $state): string => $state ?? config('filament.theme.colors.gray'))
                            ->helperText(__('base::default.g_color_helper_text')),
                        ColorPicker::make('s_color')
                            ->label(__('base::default.s_color'))
                            ->prefixIcon('heroicon-o-swatch')
                            ->formatStateUsing(fn(?string $state): string => $state ?? config('filament.theme.colors.gray'))
                            ->helperText(__('base::default.s_color_helper_text')),
                        ColorPicker::make('i_color')
                            ->label(__('base::default.i_color'))
                            ->prefixIcon('heroicon-o-swatch')
                            ->formatStateUsing(fn(?string $state): string => $state ?? config('filament.theme.colors.gray'))
                            ->helperText(__('base::default.i_color_helper_text')),
                        ColorPicker::make('w_color')
                            ->label(__('base::default.w_color'))
                            ->prefixIcon('heroicon-o-swatch')
                            ->formatStateUsing(fn(?string $state): string => $state ?? config('filament.theme.colors.gray'))
                            ->helperText(__('base::default.w_color_helper_text')),
                        ColorPicker::make('d_color')
                            ->label(__('base::default.d_color'))
                            ->prefixIcon('heroicon-o-swatch')
                            ->formatStateUsing(fn(?string $state): string => $state ?? config('filament.theme.colors.gray'))
                            ->helperText(__('base::default.d_color_helper_text')),
                    ])
                ])->columnSpan(['lg' => 1]),
        ];
    }
}
