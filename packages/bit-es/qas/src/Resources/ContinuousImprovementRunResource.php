<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContinuousImprovementRunResource\Pages;
use App\Models\ContinuousImprovementRun;
use App\Models\ContinuousImprovementMethodology;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;

class ContinuousImprovementRunResource extends Resource
{
    protected static ?string $model = ContinuousImprovementRun::class;
    protected static ?string $navigationIcon = 'heroicon-o-rocket-launch';
    protected static ?string $navigationGroup = 'Continuous Improvement';
    protected static ?string $navigationLabel = 'CI Runs';
    protected static ?string $slug = 'ci-runs';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Initiative Overview')
                    ->schema([
                        Forms\Components\Select::make('methodology_id')
                            ->label('Methodology')
                            ->options(ContinuousImprovementMethodology::pluck('methodology', 'id'))
                            ->required()
                            ->searchable(),
                        Forms\Components\TextInput::make('title')->required()->maxLength(255),
                        Forms\Components\Textarea::make('description')->rows(3),
                        Forms\Components\Select::make('status')
                            ->options([
                                'draft' => 'Draft',
                                'in_progress' => 'In Progress',
                                'completed' => 'Completed',
                                'on_hold' => 'On Hold',
                                'cancelled' => 'Cancelled',
                            ])
                            ->default('draft'),
                    ]),
                Forms\Components\Section::make('Data & Dates')
                    ->schema([
                        Forms\Components\KeyValue::make('inputs')->label('Inputs (Form Data)')->addable()->editableKeys(),
                        Forms\Components\KeyValue::make('outputs')->label('Outputs (Results)')->addable()->editableKeys(),
                        Forms\Components\DatePicker::make('started_at'),
                        Forms\Components\DatePicker::make('completed_at'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('methodology.methodology')->label('Methodology')->sortable()->searchable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'gray' => 'draft',
                        'warning' => 'in_progress',
                        'success' => 'completed',
                        'danger' => 'cancelled',
                        'info' => 'on_hold',
                    ]),
                Tables\Columns\TextColumn::make('started_at')->date(),
                Tables\Columns\TextColumn::make('completed_at')->date(),
            ])
            ->filters([
                SelectFilter::make('status')->options([
                    'draft' => 'Draft',
                    'in_progress' => 'In Progress',
                    'completed' => 'Completed',
                    'on_hold' => 'On Hold',
                    'cancelled' => 'Cancelled',
                ]),
                SelectFilter::make('methodology_id')
                    ->label('Methodology')
                    ->options(ContinuousImprovementMethodology::pluck('methodology', 'id')),
            ])
            ->defaultSort('started_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContinuousImprovementRuns::route('/'),
            'create' => Pages\CreateContinuousImprovementRun::route('/create'),
            'edit' => Pages\EditContinuousImprovementRun::route('/{record}/edit'),
        ];
    }
}
