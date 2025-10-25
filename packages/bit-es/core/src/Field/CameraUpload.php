<?php

namespace Bites\Core\Field;

use Filament\Forms\Components\BaseFileUpload;

class CameraUpload extends BaseFileUpload
{
    protected string $view = 'bites::camera-upload';
}