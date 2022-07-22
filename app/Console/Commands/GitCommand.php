<?php

namespace App\Console\Commands;

use Symfony\Component\Process\Process;
use Illuminate\Console\Command;

class GitCommand extends Command
{
    protected $signature = 'git:push {message}';

    protected $description = 'Git Command push to repo';

    public function handle()
    {
        $message = $this->argument('message');

        (new Process(['git', 'add', '.']))->run();

        (new Process(['git', 'commit', '-m', $message]))->run();

        (new Process(['git', 'push']))->run();

        $this->info('Repository updated');
    }
}
