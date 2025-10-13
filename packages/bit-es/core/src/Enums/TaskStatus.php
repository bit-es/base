<?php

namespace Bites\Core\Enums;

enum TaskStatus: string
{
    case Open = 'Open';
    case Pending = 'Pending';
    case Completed = 'Completed';
    case Defered = 'Deferred';
}
