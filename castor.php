<?php

declare(strict_types=1);

use Castor\Attribute\AsTask;
use Symfony\Component\Console\Style\SymfonyStyle;

use function Castor\run;

#[AsTask(namespace: 'symfony', description: 'Serve the application with the Symfony binary')]
function start(SymfonyStyle $io): void
{
    $io->title('Start');
    run('symfony serve --daemon', quiet: false);
    $io->success('Done!');
}

#[AsTask(namespace: 'symfony', description: 'Stop the web server')]
function stop(SymfonyStyle $io): void
{
    $io->title(__FUNCTION__);
    run('symfony server:stop', quiet: false);
    $io->success('Done!');
}

#[AsTask(name: 'all', namespace: 'test', description: 'Run all PHPUnit tests')]
function test(SymfonyStyle $io): void
{
    $io->title(__FUNCTION__);
    run('vendor/bin/simple-phpunit', quiet: false);
    $io->writeln('');
    $io->success('Done!');
}

#[AsTask(namespace: 'test', description: 'Generate the HTML PHPUnit code coverage report (stored in var/coverage)')]
function coverage(SymfonyStyle $io): void
{
    $io->title(__FUNCTION__);
    run('vendor/bin/simple-phpunit', quiet: false);
    $io->writeln('');
    $io->success('Done!');
}

#[AsTask(namespace: 'test', description: 'Open the PHPUnit code coverage report (var/coverage/index.html)')]
function cov_report(SymfonyStyle $io): void
{
    $io->title(__FUNCTION__);
    run('open var/coverage/index.html', quiet: true);
    $io->success('Done!');
}

#[AsTask(namespace: 'cs', description: 'Run PHPStan')]
function stan(SymfonyStyle $io): void
{
    $io->title(__FUNCTION__);
    run('vendor/bin/phpstan analyse -c phpstan.neon --memory-limit 1G -vvv --xdebug', quiet: false);
    $io->success('Done!');
}

#[AsTask(namespace: 'cs', description: 'Fix PHP files with php-cs-fixer (ignore PHP 8.2 warning)')]
function fix_php(SymfonyStyle $io): void
{
    $io->title(__FUNCTION__);
    run('PHP_CS_FIXER_IGNORE_ENV=1 vendor/bin/php-cs-fixer fix --allow-risky=yes', quiet: false);
    $io->success('Done!');
}

#[AsTask(name: 'all', namespace: 'cs', description: 'Run all CS checks')]
function cs_all(SymfonyStyle $io): void
{
    $io->title(__FUNCTION__);
    fix_php($io);
    stan($io);
}
#[AsTask(name: 'container', namespace: 'lint', description: 'Lint the Symfony DI container')]
function lint_container(SymfonyStyle $io): void
{
    $io->title(__FUNCTION__);
    run('bin/console lint:container', quiet: false);
    $io->success('Done!');
}

#[AsTask(name: 'twig', namespace: 'lint', description: 'Lint Twig files')]
function lint_twig(SymfonyStyle $io): void
{
    $io->title(__FUNCTION__);
    run('bin/console lint:twig', quiet: false);
    $io->success('Done!');
}

#[AsTask(name: 'yaml', namespace: 'lint', description: 'Lint Yaml files')]
function lint_yaml(SymfonyStyle $io): void
{
    $io->title(__FUNCTION__);
    run('bin/console lint:yaml config/', quiet: false);
    $io->success('Done!');
}

#[AsTask(name: 'all', namespace: 'lint', description: 'Run all lints')]
function lint_all(SymfonyStyle $io): void
{
    $io->title(__FUNCTION__);
    lint_container($io);
    lint_twig($io);
    lint_yaml($io);
}
