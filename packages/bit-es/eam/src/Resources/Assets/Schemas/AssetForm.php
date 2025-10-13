<?php

namespace Bites\Eam\Resources\Assets\Schemas;

use Bites\Core\Field;
use Filament\Forms\Components;
use Filament\Schemas\Schema;

class AssetForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Field\ScanCode::make('name')
                    ->required(),
                Components\TextInput::make('unique_id')
                    ->required(),
                // Components\FileUpload::make('image')
                //     ->image(),
                // Field\SnapPic::make('camera_test')
                //     ->label('Camera Test')
                //     ->disk('public')
                //     ->directory('uploads/services/payment_receipts_proof')
                //     ->visibility('public')
                //     ->useModal(true)
                //     ->showCameraSelector(true)
                //     ->aspect('16:9')
                //     ->imageQuality(80)
                //     ->shouldDeleteOnEdit(false)

            ]);
    }
}
