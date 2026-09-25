<?php

// This script was tested with Castor 1.1.0
// https://castor.jolicode.com/changelog/#110-2025-11-26

declare(strict_types=1);

use Castor\Attribute\AsTask;

use function Castor\context;
use function Castor\exit_code;
use function Castor\io;
use function Castor\run;
use function Castor\task;

// use function Castor\parallel;

// Change your prod domain here
const DOMAIN = 'microsymfony.ovh';

// Modify the code coverage threshold here
const COVERAGE_THRESHOLD = 100;
const COVERAGE_TEXT_REPORT = 'var/coverage/coverage-text.txt';

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

/**
 * Reduces several exit codes to a single one: 0 only if everything succeeded.
 *
 * Do NOT sum exit codes: a shell truncates them modulo 256, so eg. 128 + 128
 * would be reported as a success.
 */
function aggregate(int ...$exitCodes): int
{
    return array_any($exitCodes, static fn (int $exitCode): bool => $exitCode !== 0) ? 1 : 0;
}

#[AsTask(namespace: 'symfony', description: 'Serve the application with the Symfony binary', aliases: ['start'])]
function start(): int
{
    title('symfony:start');
    $exitCode = loadFixtures();
    if ($exitCode !== 0) {
        aborted('The database could not be prepared: the web server has NOT been started.');

        return $exitCode;
    }

    run('symfony serve --daemon');

    return 0;
}

#[AsTask(namespace: 'symfony', description: 'Stop the web server', aliases: ['stop'])]
function stop(): int
{
    title('symfony:stop');
    run('symfony server:stop');

    return resetDatabase();
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
function purge(): int
{
    title('symfony:purge');

    return success(exit_code('rm -rf ./var/cache/* ./var/log/* ./var/coverage/*'));
}

#[AsTask(namespace: 'app', description: 'Load the database fixtures', aliases: ['load-fixtures'])]
function loadFixtures(): int
{
    title('app:load-fixtures');
    $exitCode = resetDatabase();
    if ($exitCode !== 0) {
        return $exitCode;
    }

    io()->note('Running db migrations...');
    $exitCode = success(exit_code('bin/console doctrine:migrations:migrate --no-interaction'));
    if ($exitCode !== 0) {
        return $exitCode;
    }

    io()->note('Load fixtures...');

    return success(exit_code('bin/console foundry:load-fixtures --env=dev --no-interaction'));
}

function resetDatabase(): int
{
    io()->note('Resetting db...');

    return success(exit_code('rm -f ./var/data.db'));
}

const PHP_UNIT_CMD = '/vendor/bin/phpunit --testsuite=%s --filter=%s %s';
const PHP_UNIT_SUITES = ['api', 'e2e', 'functional', 'integration', 'unit'];

function getParameters(): array
{
    $filter = !empty(getenv('filter')) ? getenv('filter') : '.';
    $options = !empty(getenv('options')) ? getenv('options') : '--stop-on-failure';

    return [$filter, $options];
}

#[AsTask(name: 'all', namespace: 'test', description: 'Run tests with optional filter and options, eg: "filter=slug options=--testdox castor test"', aliases: ['test'])]
function test_all(): int
{
    title('test:all');
    [$filter, $options] = getParameters();
    $ec = exit_code(__DIR__.sprintf(PHP_UNIT_CMD, implode(',', PHP_UNIT_SUITES), $filter, $options));
    io()->writeln('');

    return $ec;
}

#[AsTask('api', namespace: 'test', description: 'Run API tests only', aliases: ['test-api'])]
function test_api(): int
{
    title('test:api');
    [$filter, $options] = getParameters();
    $ec = exit_code(__DIR__.sprintf(PHP_UNIT_CMD, 'api', $filter, $options));
    io()->writeln('');

    return $ec;
}

#[AsTask('e2e', namespace: 'test', description: 'Run E2E tests only', aliases: ['test-e2e'])]
function test_e2e(): int
{
    title('test:api');
    [$filter, $options] = getParameters();
    $ec = exit_code(__DIR__.sprintf(PHP_UNIT_CMD, 'e2e', $filter, $options));
    io()->writeln('');

    return $ec;
}

#[AsTask('functional', namespace: 'test', description: 'Run functional tests only', aliases: ['test-functional'])]
function test_functional(): int
{
    title('test:functional');
    [$filter, $options] = getParameters();
    $ec = exit_code(__DIR__.sprintf(PHP_UNIT_CMD, 'functional', $filter, $options));
    io()->writeln('');

    return $ec;
}

#[AsTask('integration', namespace: 'test', description: 'Run integration tests only', aliases: ['test-integration'])]
function test_integration(): int
{
    title('test:integration');
    [$filter, $options] = getParameters();
    $ec = exit_code(__DIR__.sprintf(PHP_UNIT_CMD, 'integration', $filter, $options));
    io()->writeln('');

    return $ec;
}

#[AsTask('unit', namespace: 'test', description: 'Run unit tests only', aliases: ['test-unit'])]
function test_unit(
): int {
    title('test:unit');
    [$filter, $options] = getParameters();
    $ec = exit_code(__DIR__.sprintf(PHP_UNIT_CMD, 'unit', $filter, $options));
    io()->writeln('');

    return $ec;
}

#[AsTask(namespace: 'test', description: 'Generate the HTML PHPUnit code coverage report (stored in var/coverage)', aliases: ['coverage'])]
function coverage(): int
{
    title('test:coverage');
    $exitCode = purge();
    if ($exitCode !== 0) {
        aborted('The previous report could not be removed: the coverage report has NOT been generated.');

        return $exitCode;
    }

    $ec = exit_code(sprintf('php -d xdebug.enable=1 -d memory_limit=-1 vendor/bin/phpunit --coverage-html=var/coverage --coverage-text=%s', COVERAGE_TEXT_REPORT),
        context: context()->withEnvironment(['XDEBUG_MODE' => 'coverage'])
    );
    if ($ec !== 0) {
        return $ec;
    }

    return success(exit_code(sprintf('php bin/coverage-checker.php %s %d', COVERAGE_TEXT_REPORT, COVERAGE_THRESHOLD)));
}

#[AsTask(namespace: 'test', description: 'Open the PHPUnit code coverage report (var/coverage/index.html)', aliases: ['cov-report'])]
function cov_report(): int
{
    title('test:cov-report');
    $coverageFile = 'var/coverage/index.html';
    if (!file_exists($coverageFile)) {
        $exitCode = coverage();
        if ($exitCode !== 0) {
            aborted('The coverage report could not be generated, there is nothing to open.');

            return $exitCode;
        }
    }

    return success(exit_code(sprintf('open %s', $coverageFile)));
}

#[AsTask(namespace: 'lint', description: 'Run PHPStan', aliases: ['stan'])]
function stan(): int
{
    title('lint:stan');

    if (!file_exists('var/cache/dev/App_KernelDevDebugContainer.xml')) {
        io()->note('PHPStan needs the dev/debug cache. Generating it...');
        run('bin/console cache:warmup',
            context: context()->withEnvironment(['APP_ENV' => 'dev', 'APP_DEBUG' => 1])
        );
    }

    return exit_code('vendor/bin/phpstan analyse -c phpstan.neon --memory-limit 1G -vv');
}

#[AsTask(name: 'php', namespace: 'fix', description: 'Fix PHP files with php-cs-fixer (ignore PHP 8.4 warnings)', aliases: ['fix-php'])]
function fix_php(): int
{
    title('fix:fix-php');
    $ec = exit_code('vendor/bin/php-cs-fixer fix',
        context: context()->withEnvironment(['PHP_CS_FIXER_IGNORE_ENV' => 1])
    );

    return success($ec);
}

function checkBiome(): void
{
    if (!file_exists('bin/biome')) {
        io()->note('Biome executable not found, donwloading it...');
        run('bin/console biomejs:download');
    }
}

#[AsTask(name: 'js-css', namespace: 'fix', description: 'Format JS/CSS files with Biome', aliases: ['fix-js-css'])]
function fix_js_css(): int
{
    checkBiome();
    title('fix:js-css');
    $ec = exit_code('bin/biome check . --write');
    io()->newLine();

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

#[AsTask(name: 'js-css', namespace: 'lint', description: 'Lint JS/CSS files with Biome', aliases: ['lint-js-css'])]
function lint_js_css(): int
{
    checkBiome();
    title('lint:js-css');
    $ec = exit_code('bin/biome check .');
    io()->newLine();

    return success($ec);
}

#[AsTask(name: 'lint-js-css', namespace: 'ci', description: 'Lint JS/CSS files with Biome (CI)')]
function ci_lint_js_css(): int
{
    title('ci:lint-js-css');
    checkBiome();
    $ec = exit_code('bin/biome ci . &> /dev/null');
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

#[AsTask(name: 'all', namespace: 'fix', description: 'Run all fixers', aliases: ['fix'])]
function fix_all(): int
{
    title('fix:all');
    $ec1 = fix_php();
    $ec2 = fix_js_css();
    io()->newLine();

    return success(aggregate($ec1, $ec2));
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

#[AsTask(name: 'doctrine', namespace: 'lint', description: 'Validate Doctrine schema', aliases: ['lint-doctrine'])]
function lint_doctrine(): int
{
    title('lint:doctrine');

    return exit_code('bin/console doctrine:schema:validate');
}

#[AsTask(name: 'all', namespace: 'lint', description: 'Run all lints', aliases: ['lint'])]
function lint_all(): int
{
    title('lint:all');
    $ec1 = stan();
    $ec2 = lint_php();
    $ec3 = lint_doctrine();
    $ec4 = lint_js_css();
    $ec5 = lint_container();
    $ec6 = lint_twig();

    return success(aggregate($ec1, $ec2, $ec3, $ec4, $ec5, $ec6));

    // if you want to speed up the process, you can run these commands in parallel
    //    parallel(
    //        fn() => lint_php(),
    //        fn() => lint_doctrine(),
    //        fn() => lint_container(),
    //        fn() => lint_twig(),
    //    );
}

#[AsTask(name: 'all', namespace: 'ci', description: 'Run CI locally', aliases: ['ci'])]
function ci(): int
{
    title('ci:all');
    io()->section('Coverage');
    // coverage() purges and loads the fixtures itself
    $exitCode = coverage();
    if ($exitCode !== 0) {
        aborted('The test suite failed: the lints have NOT been run.');

        return $exitCode;
    }

    // lint:doctrine validates the schema of the *dev* database, which must therefore
    // exist and be migrated. The test suite above does not provide it: the test
    // environment has its own database (@see .env.test).
    $exitCode = loadFixtures();
    if ($exitCode !== 0) {
        aborted('The dev database could not be prepared: the lints have NOT been run.');

        return $exitCode;
    }

    io()->section('Lints');

    return lint_all();
}

#[AsTask(name: 'versions', namespace: 'helpers', description: 'Output current stack versions', aliases: ['versions'])]
function versions(): void
{
    title('helpers:versions');
    io()->note('Castor');
    run('castor --version');
    io()->newLine();

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
    exit_code('vendor/bin/php-cs-fixer --version',
        context: context()->withEnvironment(['PHP_CS_FIXER_IGNORE_ENV' => 1])
    );

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

#[AsTask(name: 'deploy', namespace: 'prod', description: 'Simple manual deploy on a VPS (this is to update the demo site https://microsymfony.ovh/)', aliases: ['deploy'])]
function deploy(): int
{
    // Stop at the first failing step: carrying on after eg. a failed "composer install"
    // would push a half-updated application live.
    $steps = [
        'git pull',
        'composer install -n',
        'chown -R www-data: ./var/*',
        'cp .env.local.dist .env.local',
        'composer dump-env prod -n',
        'bin/console asset-map:compile',
    ];

    foreach ($steps as $step) {
        $exitCode = exit_code($step);
        io()->newLine();
        if ($exitCode !== 0) {
            aborted(sprintf('Step "%s" failed: the deployment has been stopped.', $step));

            return $exitCode;
        }
    }

    return success(0);
}

#[AsTask(name: 'le-renew', namespace: 'prod', description: "Renew Let's Encrypt HTTPS certificates", aliases: ['le-renew'])]
function le_renew(): int
{
    $ec = exit_code(sprintf('certbot --apache -d %s -d www.%s', DOMAIN, DOMAIN));
    io()->newLine();

    return success($ec);
}
