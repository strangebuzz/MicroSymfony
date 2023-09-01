<?php

// Until the 1.x Castor version the API may be unstable
// it script was tested with Castor 0.8.0

declare(strict_types=1);

use Castor\Attribute\AsTask;
use Symfony\Component\Console\Command\Command;

use function Castor\get_command;
use function Castor\io;
use function Castor\run;

// use function Castor\parallel;

/**
 * Don't display the description when using a parent command context.
 */
function title(string $title, Command $command = null): void
{
    io()->title($title.($command !== null ? ': '.$command->getDescription() : ''));
}

function success(): void
{
    io()->success('Done!');
}

#[AsTask(namespace: 'symfony', description: 'Serve the application with the Symfony binary', )]
function start(): void
{
    title(__FUNCTION__, get_command());
    run('symfony serve --daemon', quiet: false);
    success();
}

#[AsTask(namespace: 'symfony', description: 'Stop the web server')]
function stop(): void
{
    title(__FUNCTION__, get_command());
    run('symfony server:stop', quiet: false);
    success();
}

#[AsTask(name: 'all', namespace: 'test', description: 'Run all PHPUnit tests')]
function test(): void
{
    title(__FUNCTION__, get_command());
    run('vendor/bin/simple-phpunit', quiet: false);
    io()->writeln('');
    success();
}

#[AsTask(namespace: 'test', description: 'Generate the HTML PHPUnit code coverage report (stored in var/coverage)')]
function coverage(): void
{
    title(__FUNCTION__, get_command());
    run('php -d xdebug.enable=1 -d memory_limit=-1 vendor/bin/simple-phpunit --coverage-html=var/coverage',
        environment: [
          'XDEBUG_MODE' => 'coverage',
        ],
        quiet: false
    );
    run('php bin/coverage-checker.php var/coverage/clover.xml 100', quiet: false);
    success();
}

#[AsTask(namespace: 'test', description: 'Open the PHPUnit code coverage report (var/coverage/index.html)')]
function cov_report(): void
{
    title(__FUNCTION__, get_command());
    run('open var/coverage/index.html', quiet: true);
    success();
}

#[AsTask(namespace: 'cs', description: 'Run PHPStan')]
function stan(): void
{
    title(__FUNCTION__, get_command());
    run('vendor/bin/phpstan analyse -c phpstan.neon --memory-limit 1G -vvv --xdebug', quiet: false);
    success();
}

#[AsTask(namespace: 'cs', description: 'Fix PHP files with php-cs-fixer (ignore PHP 8.2 warning)')]
function fix_php(): void
{
    title(__FUNCTION__, get_command());
    run('vendor/bin/php-cs-fixer fix --allow-risky=yes',
        environment: [
           'PHP_CS_FIXER_IGNORE_ENV' => 1,
        ],
        quiet: false
    );
    success();
}

#[AsTask(name: 'all', namespace: 'cs', description: 'Run all CS checks')]
function cs_all(): void
{
    title(__FUNCTION__, get_command());
    fix_php();
    stan();
}
#[AsTask(name: 'container', namespace: 'lint', description: 'Lint the Symfony DI container')]
function lint_container(): void
{
    title(__FUNCTION__, get_command());
    run('bin/console lint:container', quiet: false);
    success();
}

#[AsTask(name: 'twig', namespace: 'lint', description: 'Lint Twig files')]
function lint_twig(): void
{
    title(__FUNCTION__, get_command());
    run('bin/console lint:twig templates/', quiet: false);
    success();
}

#[AsTask(name: 'yaml', namespace: 'lint', description: 'Lint Yaml files')]
function lint_yaml(): void
{
    title(__FUNCTION__, get_command());
    run('bin/console lint:yaml --parse-tags config/', quiet: false);
    success();
}

#[AsTask(name: 'all', namespace: 'lint', description: 'Run all lints')]
function lint_all(): void
{
    title(__FUNCTION__, get_command());
    lint_container();
    lint_twig();
    lint_yaml();

    // if you want to speed up the process, you can run these commands in parallel
    //    parallel(
    //        fn() => lint_container(null),
    //        fn() => lint_twig(),
    //        fn() => lint_yaml(),
    //    );
}

#[AsTask(name: 'all', namespace: 'ci', description: 'Run CI locally')]
function ci(): void
{
    title(__FUNCTION__, get_command());
    test();
    cs_all();
    lint_all();
}
