<?php

namespace Bites\Core\Resources\Companies\Schemas;

use Filament\Schemas\Schema;
use App\Filament\Forms\Components\LocationPicker;
use Filament\Forms\Components\FileUpload;

class CompanyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                LocationPicker::make('location')
                    ->label('Location')
                    ->required(),
\Bites\Core\Field\SnapPic::make('logo')
                    ->label('Company Logo')
                    ->required(),

                FileUpload::make('attachment')
            ]);
    }
}
