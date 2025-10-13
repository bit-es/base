<?php

namespace Bites\Core\Resources\Turtles\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TurtleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Forms\Components\Select::make('org_unit_id')->relationship('orgUnit', 'name')->label('Ownership')->required()->columnSpanFull(),

                Section::make('LeftForeLimb')->description('How: Documentation or Method')->schema([
                    Forms\Components\TextInput::make('methods')->required(),

                    Forms\Components\Select::make('sop_id')->relationship('sop', 'code')->label('SOP')->searchable(),
                    Forms\Components\Select::make('wi_id')->relationship('wi', 'code')->label('WI')->searchable(),
                    Forms\Components\Select::make('form_id')->relationship('form', 'code')->label('Form')->searchable(),

                ]),
                Section::make('Head')->description('I of SIPOC')->schema([
                    Forms\Components\TextInput::make('input')->required(),
                ]),
                Section::make('RightForeLimb')->description('What: Equipment & Materials')->schema([
                    Forms\Components\TextInput::make('resources')->required(),
                ]),

                Section::make('Body')->description('P of SIPOC')->schema([
                    Forms\Components\TextInput::make('code')->required(),
                    Forms\Components\TextInput::make('name')->required(),
                    Forms\Components\Textarea::make('description')->columnSpanFull(),
                    Forms\Components\TextInput::make('kpis')->required(),
                ])->columnspanFull(),

                Section::make('LeftHindLimb')->description('Criteria: Objectives & Targets')->schema([
                    Forms\Components\TextInput::make('kpis')->required(),
                ]),
                Section::make('Tail')->description('O of SIPOC')->schema([
                    Forms\Components\TextInput::make('output')->required(),
                ]),
                Section::make('RightHindLimb')->description('Who: Personnel & Competencies')->schema([
                    Forms\Components\Select::make('supplier_id')->relationship('supplier', 'name')->label('S in SIPOC')->searchable(),
                    Forms\Components\Select::make('org_role_id')->relationship('orgRole', 'name')->label('Process Actors')->searchable(),
                    Forms\Components\Select::make('customer_id')->relationship('customer', 'name')->label('C in SIPOC')->searchable(),
                ]),
            ]);
    }
}
