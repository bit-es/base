<?php

namespace Bites\Base\Forms;

use Bites\Base\Enums\SocialNetworkEnum;
use Filament\Forms\Components\TextInput;

class SocialNetworkFieldsForm
{
    public static function get(): array
    {
        $fields = [];
        foreach (SocialNetworkEnum::options() as $key => $value) {
            $fields[] = TextInput::make($key)
                ->label(ucfirst(strtolower($value)));
        }

        return $fields;
    }
}
