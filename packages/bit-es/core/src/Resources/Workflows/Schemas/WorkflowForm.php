<?php

namespace Bites\Core\Resources\Workflows\Schemas;

use Bites\Core\Models\Workflow;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Repeater\TableColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\Alignment;
use Illuminate\Database\Eloquent\Model;

class WorkflowForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required(),
                Section::make('from Turtle')
                    ->inlineLabel()
                    ->schema([
                        TextEntry::make('turtle.code')
                            ->label('Code'),
                        TextEntry::make('turtle.name')
                            ->label('Name'),
                    ]),
                // ->relationship('turtle', 'name')
                // ->disabled()
                // ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->code} .' : '.{$record->namee}")
                // ->label('from Turtle'),
                Textarea::make('description')->nullable()->columnspanFull()->rows(4),
                Repeater::make('nodes')
                    // ->table([
                    //     TableColumn::make('Name'),
                    //     TableColumn::make('Role'),
                    //     TableColumn::make('GoTo'),

                    // ])
                    ->schema([
                        Flex::make([
                            TextInput::make('name')->required(),
                            // Toggle::make('is_initial')->distinct(),
                            // Toggle::make('is_final')->distinct(),
                            Select::make('assignee_role_id')
                                ->relationship('assigneeRole', 'name')
                                ->nullable()->grow(false),
                        ])->from('md'),
                        Repeater::make('transitions')
                            ->table([
                                TableColumn::make('Action'),
                                // TableColumn::make('From'),
                                TableColumn::make('Goes To'),
                            ])->compact()
                            ->schema([
                                TextInput::make('action_name')->required(),
                                // Select::make('from_state_id')
                                //     ->relationship('fromState', 'name')
                                //     ->required(),
                                Select::make('to_state_id')
                                    ->relationship('toState', 'name')
                                    ->required(),
                            ])
                            ->relationship()
                            ->addActionLabel('Add Action')
                            ->addActionAlignment(Alignment::Start)
                            ->label('Path')
                            ->orderColumn('sort'),
                    ])
                    ->relationship()
                    ->deletable(fn ($record) => $record->is_initial || $record->is_final ? false : true)
                    ->orderColumn('sort')
                    ->label('Workflow Nodes')
                    ->collapsible()
                    ->columnSpanFull(),

            ]);
        // ->afterSave(function (Workflow $record) {$record->updateInitialAndFinalNodes();});
    }
}
