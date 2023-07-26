<?php

declare(strict_types=1);

use Castor\Attribute\AsTask;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;

use function Castor\run;

/**
 * Don't display the description when using a parent command context.
 */
function title(SymfonyStyle $io, string $title, Command $command = null): void
{
    $io->title($title.($command !== null ? ': '.$command->getDescription() : ''));
}

function success(SymfonyStyle $io): void
{
    $io->success('Done!');
}

#[AsTask(namespace: 'symfony', description: 'Serve the application with the Symfony binary', )]
function start(SymfonyStyle $io, Command $command = null): void
{
    title($io, __FUNCTION__, $command);
    run('symfony serve --daemon', quiet: false);
    success($io);
}

#[AsTask(namespace: 'symfony', description: 'Stop the web server')]
function stop(SymfonyStyle $io, Command $command = null): void
{
    title($io, __FUNCTION__, $command);
    run('symfony server:stop', quiet: false);
    success($io);
}

#[AsTask(name: 'all', namespace: 'test', description: 'Run all PHPUnit tests')]
function test(SymfonyStyle $io, Command $command = null): void
{
    title($io, __FUNCTION__, $command);
    run('vendor/bin/simple-phpunit',
        environment: [
            'XDEBUG_MODE' => 'coverage',
        ],
        quiet: false
    );
    $io->writeln('');
    success($io);
}

#[AsTask(namespace: 'test', description: 'Generate the HTML PHPUnit code coverage report (stored in var/coverage)')]
function coverage(SymfonyStyle $io, Command $command = null): void
{
    title($io, __FUNCTION__, $command);
    run('php -d xdebug.enable=1 -d memory_limit=-1 vendor/bin/simple-phpunit --coverage-html=var/coverage',
        environment: [
          'XDEBUG_MODE' => 'coverage',
        ],
        quiet: false
    );
    run('php bin/coverage-checker.php var/coverage/clover.xml 100', quiet: false);
    success($io);
}

#[AsTask(namespace: 'test', description: 'Open the PHPUnit code coverage report (var/coverage/index.html)')]
function cov_report(SymfonyStyle $io, Command $command = null): void
{
    title($io, __FUNCTION__, $command);
    run('open var/coverage/index.html', quiet: true);
    success($io);
}

#[AsTask(namespace: 'cs', description: 'Run PHPStan')]
function stan(SymfonyStyle $io, Command $command = null): void
{
    title($io, __FUNCTION__, $command);
    run('vendor/bin/phpstan analyse -c phpstan.neon --memory-limit 1G -vvv --xdebug', quiet: false);
    success($io);
}

#[AsTask(namespace: 'cs', description: 'Fix PHP files with php-cs-fixer (ignore PHP 8.2 warning)')]
function fix_php(SymfonyStyle $io, Command $command = null): void
{
    title($io, __FUNCTION__, $command);
    run('vendor/bin/php-cs-fixer fix --allow-risky=yes',
        environment: [
           'PHP_CS_FIXER_IGNORE_ENV' => 1,
        ],
        quiet: false
    );
    success($io);
}

#[AsTask(name: 'all', namespace: 'cs', description: 'Run all CS checks')]
function cs_all(SymfonyStyle $io, Command $command = null): void
{
    title($io, __FUNCTION__, $command);
    fix_php($io, null);
    stan($io, null);
}
#[AsTask(name: 'container', namespace: 'lint', description: 'Lint the Symfony DI container')]
function lint_container(SymfonyStyle $io, Command $command = null): void
{
    title($io, __FUNCTION__, $command);
    run('bin/console lint:container', quiet: false);
    success($io);
}

#[AsTask(name: 'twig', namespace: 'lint', description: 'Lint Twig files')]
function lint_twig(SymfonyStyle $io, Command $command = null): void
{
    title($io, __FUNCTION__, $command);
    run('bin/console lint:twig', quiet: false);
    success($io);
}

#[AsTask(name: 'yaml', namespace: 'lint', description: 'Lint Yaml files')]
function lint_yaml(SymfonyStyle $io, Command $command = null): void
{
    title($io, __FUNCTION__, $command);
    run('bin/console lint:yaml config/', quiet: false);
    success($io);
}

#[AsTask(name: 'all', namespace: 'lint', description: 'Run all lints')]
function lint_all(SymfonyStyle $io, Command $command = null): void
{
    title($io, __FUNCTION__, $command);
    lint_container($io);
    lint_twig($io);
    lint_yaml($io);
}

#[AsTask(name: 'all', namespace: 'ci', description: 'Run CI locally')]
function ci(SymfonyStyle $io, Command $command = null): void
{
    title($io, __FUNCTION__, $command);
    test($io);
    cs_all($io);
    lint_all($io);
}
