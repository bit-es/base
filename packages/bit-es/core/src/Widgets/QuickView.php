<?php

namespace Bites\Core\Widgets;

use Filament\Widgets\Widget;

class QuickView extends Widget
{
    protected int | string | array $columnSpan = 'full';

    protected string $view = 'bites::widgets.quick-view';
}
