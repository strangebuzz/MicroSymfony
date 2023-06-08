<?php

declare(strict_types=1);

use Castor\Attribute\AsTask;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;

use function Castor\run;

/**
 * Don't display the description when using a parent command context.
 */
function showDescription(SymfonyStyle $io, Command $command = null): void
{
    if ($command === null) {
        $io->section($command->getDescription());
    }
}

#[AsTask(namespace: 'symfony', description: 'Serve the application with the Symfony binary')]
function start(SymfonyStyle $io, Command $command): void
{
    $io->title('Start');
    showDescription($io, $command);
    run('symfony serve --daemon', quiet: false);
    $io->success('Done!');
}

#[AsTask(namespace: 'symfony', description: 'Stop the web server')]
function stop(SymfonyStyle $io, Command $command): void
{
    $io->title(__FUNCTION__);
    showDescription($io, $command);
    run('symfony server:stop', quiet: false);
    $io->success('Done!');
}

#[AsTask(name: 'all', namespace: 'test', description: 'Run all PHPUnit tests')]
function test(SymfonyStyle $io, Command $command = null): void
{
    $io->title(__FUNCTION__);
    showDescription($io, $command);
    run('vendor/bin/simple-phpunit', quiet: false);
    $io->writeln('');
    $io->success('Done!');
}

#[AsTask(namespace: 'test', description: 'Generate the HTML PHPUnit code coverage report (stored in var/coverage)')]
function coverage(SymfonyStyle $io, Command $command): void
{
    $io->title(__FUNCTION__);
    showDescription($io, $command);
    run('vendor/bin/simple-phpunit', quiet: false);
    $io->writeln('');
    $io->success('Done!');
}

#[AsTask(namespace: 'test', description: 'Open the PHPUnit code coverage report (var/coverage/index.html)')]
function cov_report(SymfonyStyle $io, Command $command): void
{
    $io->title(__FUNCTION__);
    showDescription($io, $command);
    run('open var/coverage/index.html', quiet: true);
    $io->success('Done!');
}

#[AsTask(namespace: 'cs', description: 'Run PHPStan')]
function stan(SymfonyStyle $io, Command $command): void
{
    $io->title(__FUNCTION__);
    showDescription($io, $command);
    run('vendor/bin/phpstan analyse -c phpstan.neon --memory-limit 1G -vvv --xdebug', quiet: false);
    $io->success('Done!');
}

#[AsTask(namespace: 'cs', description: 'Fix PHP files with php-cs-fixer (ignore PHP 8.2 warning)')]
function fix_php(SymfonyStyle $io, Command $command): void
{
    $io->title(__FUNCTION__);
    showDescription($io, $command);
    run('PHP_CS_FIXER_IGNORE_ENV=1 vendor/bin/php-cs-fixer fix --allow-risky=yes', quiet: false);
    $io->success('Done!');
}

#[AsTask(name: 'all', namespace: 'cs', description: 'Run all CS checks')]
function cs_all(SymfonyStyle $io, Command $command = null): void
{
    $io->title(__FUNCTION__);
    showDescription($io, $command);
    fix_php($io, $command);
    stan($io, $command);
}
#[AsTask(name: 'container', namespace: 'lint', description: 'Lint the Symfony DI container')]
function lint_container(SymfonyStyle $io, Command $command = null): void
{
    $io->title(__FUNCTION__);
    showDescription($io, $command);
    run('bin/console lint:container', quiet: false);
    $io->success('Done!');
}

#[AsTask(name: 'twig', namespace: 'lint', description: 'Lint Twig files')]
function lint_twig(SymfonyStyle $io, Command $command = null): void
{
    $io->title(__FUNCTION__);
    showDescription($io, $command);
    run('bin/console lint:twig', quiet: false);
    $io->success('Done!');
}

#[AsTask(name: 'yaml', namespace: 'lint', description: 'Lint Yaml files')]
function lint_yaml(SymfonyStyle $io, Command $command = null): void
{
    $io->title(__FUNCTION__);
    showDescription($io, $command);
    run('bin/console lint:yaml config/', quiet: false);
    $io->success('Done!');
}

#[AsTask(name: 'all', namespace: 'lint', description: 'Run all lints')]
function lint_all(SymfonyStyle $io, Command $command = null): void
{
    $io->title(__FUNCTION__);
    showDescription($io, $command);
    lint_container($io);
    lint_twig($io);
    lint_yaml($io);
}

#[AsTask(name: 'all', namespace: 'ci', description: 'Run CI locally')]
function ci(SymfonyStyle $io, Command $command): void
{
    $io->title(__FUNCTION__);
    test($io);
    cs_all($io);
    lint_all($io);
}
