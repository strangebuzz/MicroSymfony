<?php

declare(strict_types=1);

use Castor\Attribute\AsTask;
use Symfony\Component\Console\Style\SymfonyStyle;

use function Castor\run;

#[AsTask(description: 'Welcome to Castor!')]
function hello(SymfonyStyle $io): void
{
    $currentUser = trim(run('whoami', quiet: true)->getOutput());

    $io->title(sprintf('Hello %s!', $currentUser));
}