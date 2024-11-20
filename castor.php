<?php

// Until the 1.x Castor version the API may be unstable
// this script was tested with Castor 0.18.2

declare(strict_types=1);

use Castor\Attribute\AsTask;

use function Castor\context;
use function Castor\exit_code;
use function Castor\io;
use function Castor\run;
use function Castor\task;

// use function Castor\parallel;

// You can modify the coverage threshold here
const COVERAGE_THRESHOLD = 80;

function title(string $name): void
{
    $task = task();
    if ($task !== null && $task->getName() === $name) {
        io()->title($task->getDescription());
    }
}

function success(int $exitCode): int
{
    if ($exitCode === 0) {
        io()->success('Done!');
    } else {
        io()->error(sprintf('Failure (exit code %d returned).', $exitCode));
    }

    return $exitCode;
}

function aborted(string $message = 'Aborted'): void
{
    io()->warning($message);
}

#[AsTask(namespace: 'symfony', description: 'Serve the application with the Symfony binary', aliases: ['start'])]
function start(): void
{
    title('symfony:start');
    run('symfony serve --daemon');
}

#[AsTask(namespace: 'symfony', description: 'Stop the web server', aliases: ['stop'])]
function stop(): void
{
    title('symfony:stop');
    run('symfony server:stop');
}

#[AsTask(namespace: 'symfony', description: 'Switch to the production environment', aliases: ['go-prod'])]
function go_prod(): void
{
    title('symfony:go_prod');
    if (io()->confirm('Are you sure you want to switch to the production environment? This will overwrite your .env.local file.', false)) {
        run('cp .env.local.dist .env.local');
        run('bin/console asset-map:compile');
        success(0);

        return;
    }

    aborted();
}

#[AsTask(namespace: 'symfony', description: 'Switch to the development environment', aliases: ['go-dev'])]
function go_dev(): void
{
    title('symfony:go_dev');
    if (io()->confirm('Are you sure you want to switch to the development environment? This will delete your .env.local file.', false)) {
        run('rm -f .env.local');
        run('rm -rf ./public/assets/*');
        success(0);

        return;
    }

    aborted();
}

#[AsTask(namespace: 'symfony', description: 'Purge all Symfony cache and logs', aliases: ['purge'])]
function purge(): void
{
    title('symfony:purge');
    success(exit_code('rm -rf ./var/cache/* ./var/logs/* ./var/coverage/*'));
}

#[AsTask(namespace: 'app', description: 'Load the database fixtures', aliases: ['load-fixtures'])]
function loadFixures(): void
{
    title('app:load-fixtures');
    io()->note('Resetting db...');
    success(exit_code('rm -f ./var/data.db && touch ./var/data.db'));
    io()->note('Running db migrations and load fixtures...');
    success(exit_code('bin/console eloquent:migrate:fresh --seed'));
}

#[AsTask(name: 'all', namespace: 'test', description: 'Run all PHPUnit tests', aliases: ['test'])]
function test_all(): int
{
    title('test:all');
    loadFixures();
    $ec = exit_code(__DIR__.'/vendor/bin/phpunit');
    io()->writeln('');

    return $ec;
}

#[AsTask(namespace: 'test', description: 'Generate the HTML PHPUnit code coverage report (stored in var/coverage)', aliases: ['coverage'])]
function coverage(): int
{
    title('test:coverage');
    loadFixures();
    $ec = exit_code('php -d xdebug.enable=1 -d memory_limit=-1 vendor/bin/phpunit --coverage-html=var/coverage --coverage-clover=var/coverage/clover.xml',
        context: context()->withEnvironment(['XDEBUG_MODE' => 'coverage'])
    );
    if ($ec !== 0) {
        return $ec;
    }

    return success(exit_code(sprintf('php bin/coverage-checker.php var/coverage/clover.xml %d', COVERAGE_THRESHOLD)));
}

#[AsTask(namespace: 'test', description: 'Open the PHPUnit code coverage report (var/coverage/index.html)', aliases: ['cov-report'])]
function cov_report(): void
{
    title('test:cov-report');
    success(exit_code('open var/coverage/index.html'));
}

#[AsTask(namespace: 'cs', description: 'Run PHPStan', aliases: ['stan'])]
function stan(): int
{
    title('cs:stan');

    if (!file_exists('var/cache/dev/App_KernelDevDebugContainer.xml')) {
        io()->note('PHPStan needs the dev/debug cache. Generating it...');
        run('bin/console cache:warmup',
            context: context()->withEnvironment(['APP_ENV' => 'dev', 'APP_DEBUG' => 1])
        );
    }

    return exit_code('vendor/bin/phpstan analyse -c phpstan.neon --memory-limit 1G -vv');
}

#[AsTask(namespace: 'cs', description: 'Fix PHP files with php-cs-fixer (ignore PHP 8.2 warning)', aliases: ['fix-php'])]
function fix_php(): int
{
    title('cs:fix-php');
    $ec = exit_code('vendor/bin/php-cs-fixer fix',
        context: context()->withEnvironment(['PHP_CS_FIXER_IGNORE_ENV' => 1])
    );

    return success($ec);
}

#[AsTask(name: 'php', namespace: 'lint', description: 'Lint PHP files with php-cs-fixer (report only)', aliases: ['lint-php'])]
function lint_php(): int
{
    title('lint:php');
    $ec = exit_code('vendor/bin/php-cs-fixer fix --dry-run',
        context: context()->withEnvironment(['PHP_CS_FIXER_IGNORE_ENV' => 1])
    );
    io()->newLine();

    return success($ec);
}

#[AsTask(name: 'lint-php', namespace: 'ci', description: 'Lint PHP files with php-cs-fixer (for CI)')]
function ci_lint_php(): int
{
    title('ci:lint-php');

    $ec = exit_code('command -v cs2pr &> /dev/null');
    if ($ec !== 0) {
        aborted('cs2pr not found. Locally, Please use the "lint:php" task.');

        return 1;
    }

    return exit_code('vendor/bin/php-cs-fixer fix --allow-risky=yes --dry-run --format=checkstyle | cs2pr',
        context: context()->withEnvironment(['PHP_CS_FIXER_IGNORE_ENV' => 1])
    );
}

#[AsTask(name: 'all', namespace: 'cs', description: 'Run all CS checks', aliases: ['cs'])]
function cs_all(): int
{
    title('cs:all');
    $ec1 = fix_php();
    $ec2 = stan();
    io()->newLine();

    return success($ec1 + $ec2);
}
#[AsTask(name: 'container', namespace: 'lint', description: 'Lint the Symfony DI container', aliases: ['lint-container'])]
function lint_container(): int
{
    title('lint:container');

    return exit_code('bin/console lint:container');
}

#[AsTask(name: 'twig', namespace: 'lint', description: 'Lint Twig files', aliases: ['lint-twig'])]
function lint_twig(): int
{
    title('lint:twig');

    return exit_code('bin/console lint:twig templates/');
}

#[AsTask(name: 'yaml', namespace: 'lint', description: 'Lint Yaml files', aliases: ['lint-yaml'])]
function lint_yaml(): int
{
    title('lint:yaml');

    return exit_code('bin/console lint:yaml --parse-tags config/');
}

#[AsTask(name: 'all', namespace: 'lint', description: 'Run all lints', aliases: ['lint'])]
function lint_all(): int
{
    title('lint:all');
    $ec1 = lint_php();
    $ec2 = lint_container();
    $ec3 = lint_twig();
    $ec4 = lint_yaml();

    return success($ec1 + $ec2 + $ec3 + $ec4);

    // if you want to speed up the process, you can run these commands in parallel
    //    parallel(
    //        fn() => lint_php(),
    //        fn() => lint_container(),
    //        fn() => lint_twig(),
    //        fn() => lint_yaml(),
    //    );
}

#[AsTask(name: 'all', namespace: 'ci', description: 'Run CI locally', aliases: ['ci'])]
function ci(): void
{
    title('ci:all');
    purge();
    loadFixures();
    io()->section('Coverage');
    coverage();
    io()->section('Codings standards');
    cs_all();
    io()->section('Lints');
    lint_all();
}

#[AsTask(name: 'versions', namespace: 'helpers', description: 'Output current stack versions', aliases: ['versions'])]
function versions(): void
{
    title('helpers:versions');
    io()->note('PHP');
    run('php -v');
    io()->newLine();

    io()->note('Composer');
    run('composer --version');
    io()->newLine();

    io()->note('Symfony');
    run('bin/console --version');
    io()->newLine();

    io()->note('PHPUnit');
    run('vendor/bin/phpunit --version');

    io()->note('PHPStan');
    run('vendor/bin/phpstan --version');
    io()->newLine();

    io()->note('php-cs-fixer');
    run('vendor/bin/php-cs-fixer --version');
    io()->newLine();

    success(0);
}

#[AsTask(name: 'check-requirements', namespace: 'helpers', description: 'Checks requirements for running Symfony', aliases: ['check-requirements'])]
function check_requirements(): int
{
    $ec = exit_code('vendor/bin/requirements-checker');
    io()->newLine();

    return success($ec);
}
