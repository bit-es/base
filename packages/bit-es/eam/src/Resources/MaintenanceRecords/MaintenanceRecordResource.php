<?php

namespace Bites\Eam\Resources\MaintenanceRecords;

use BackedEnum;
use Bites\Eam\Models\MaintenanceRecord;
use Bites\Eam\Resources\MaintenanceRecords\Pages\CreateMaintenanceRecord;
use Bites\Eam\Resources\MaintenanceRecords\Pages\EditMaintenanceRecord;
use Bites\Eam\Resources\MaintenanceRecords\Pages\ListMaintenanceRecords;
use Bites\Eam\Resources\MaintenanceRecords\Schemas\MaintenanceRecordForm;
use Bites\Eam\Resources\MaintenanceRecords\Tables\MaintenanceRecordsTable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use unitEnum;

class MaintenanceRecordResource extends Resource
{
    protected static ?string $model = MaintenanceRecord::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentCheck;

    protected static string|UnitEnum|null $navigationGroup = 'Maintenance';

    protected static ?string $modelLabel = 'Records';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return MaintenanceRecordForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MaintenanceRecordsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMaintenanceRecords::route('/'),
            'create' => CreateMaintenanceRecord::route('/create'),
            'edit' => EditMaintenanceRecord::route('/{record}/edit'),
        ];
    }
}
