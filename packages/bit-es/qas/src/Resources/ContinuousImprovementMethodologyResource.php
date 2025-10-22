<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContinuousImprovementMethodologyResource\Pages;
use App\Models\ContinuousImprovementMethodology;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class ContinuousImprovementMethodologyResource extends Resource
{
    protected static ?string $model = ContinuousImprovementMethodology::class;

    protected static ?string $navigationIcon = 'heroicon-o-light-bulb';

    protected static ?string $navigationGroup = 'Continuous Improvement';

    protected static ?string $navigationLabel = 'CI Methodologies';

    protected static ?string $slug = 'ci-methodologies';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Method Details')
                    ->schema([
                        Forms\Components\TextInput::make('methodology')->required()->maxLength(255),
                        Forms\Components\TextInput::make('purpose')->maxLength(255),
                        Forms\Components\Textarea::make('brief_explanation')->rows(3),
                    ]),
                Forms\Components\Section::make('Form & Reporting')
                    ->schema([
                        Forms\Components\Toggle::make('needs_form')->label('Requires Input Form?'),
                        Forms\Components\Toggle::make('needs_report')->label('Requires Report?'),
                        Forms\Components\TextInput::make('typical_record_type')->maxLength(255),
                        Forms\Components\TextInput::make('example_template_name')->maxLength(255),
                        Forms\Components\TextInput::make('external_url')->label('External Reference URL')->url(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('methodology')->sortable()->searchable()->label('Methodology'),
                Tables\Columns\TextColumn::make('purpose')->wrap(),
                Tables\Columns\IconColumn::make('needs_form')->boolean()->label('Form?'),
                Tables\Columns\IconColumn::make('needs_report')->boolean()->label('Report?'),
                Tables\Columns\TextColumn::make('example_template_name')->label('Template'),
                Tables\Columns\TextColumn::make('external_url')->label('Reference')->url(fn ($record) => $record->external_url, true),
            ])
            ->filters([
                TernaryFilter::make('needs_form'),
                TernaryFilter::make('needs_report'),
            ])
            ->defaultSort('methodology');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContinuousImprovementMethodologies::route('/'),
            'create' => Pages\CreateContinuousImprovementMethodology::route('/create'),
            'edit' => Pages\EditContinuousImprovementMethodology::route('/{record}/edit'),
        ];
    }
}
