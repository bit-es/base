<?php

namespace Bites\Core\Resources\Turtles\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TurtleInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Section::make('LeftForeLimb')->description('How: Documentation or Method')
                    ->schema([
                        TextEntry::make('methods'),
                        TextEntry::make('sop.code')->label('SOP'),
                        TextEntry::make('wi.code')->label('WI'),
                        TextEntry::make('form.code')->label('Form'),
                    ]),
                Section::make('Head')->description('Inputs')
                    ->schema([
                        TextEntry::make('input'),
                    ]),
                Section::make('RightForeLimb')->description('What: Equipment & Materials')
                    ->schema([
                        TextEntry::make('resources'),
                    ]),

                // Section::make('LeftBody')->schema([
                //     TextEntry::make('resources'),
                //     TextEntry::make('methods'),
                //     TextEntry::make('kpis'),
                //     TextEntry::make('description')->columnSpanFull(),
                // ]),
                Section::make('Body')->description('Process Details')
                    ->schema([
                        TextEntry::make('code'),
                        TextEntry::make('name'),
                        TextEntry::make('orgUnit.name')->label('Owner'),
                        TextEntry::make('description')->columnSpanFull(),
                        TextEntry::make('kpis'),
                    ])->columnspanFull(),
                // Section::make('RightBody')->schema([
                //     TextEntry::make('resources'),
                //     TextEntry::make('methods'),
                //     TextEntry::make('kpis'),
                //     TextEntry::make('description')->columnSpanFull(),
                // ]),

                Section::make('LeftHindLimb')->description('Criteria: Objectives & Targets')
                    ->schema([
                        TextEntry::make('kpis'),
                    ]),
                Section::make('Tail')->description('Outputs')
                    ->schema([
                        TextEntry::make('output'),
                    ]),
                Section::make('RightHindLimb')->description('Who: Personnel & Competencies')
                    ->schema([
                        TextEntry::make('orgRole.name')->label('Role')->color('primary')->icon('myicon-c-orgrole'),
                        TextEntry::make('supplier.name')->label('Supplier')->color('info')->icon('myicon-c-supplier'),
                        TextEntry::make('form.name')->label('Customer')->color('danger')->icon('myicon-c-customer'),
                    ]),

            ]);
    }
}
