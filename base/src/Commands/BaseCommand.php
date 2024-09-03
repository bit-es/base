<?php

namespace Bites\Base\Commands;

use Illuminate\Console\Command;

class BaseCommand extends Command
{
    public $signature = 'base';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
