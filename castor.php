<?php

declare(strict_types=1);

use Castor\Attribute\AsTask;
use Symfony\Component\Console\Style\SymfonyStyle;

use function Castor\run;

#[AsTask(description: 'Serve the application with the Symfony binary')]
function start(SymfonyStyle $io): void
{
    $io->title('Start');
    run('symfony serve --daemon', quiet: false);
    $io->success('Done!');
}

#[AsTask(description: 'Stop the web server')]
function stop(SymfonyStyle $io): void
{
    $io->title(__FUNCTION__);
    run('symfony server:stop', quiet: false);
    $io->success('Done!');
}

#[AsTask(description: 'Run all PHPUnit tests')]
function test(SymfonyStyle $io): void
{
    $io->title(__FUNCTION__);
    run('vendor/bin/simple-phpunit', quiet: false);
    $io->writeln('');
    $io->success('Done!');
}

#[AsTask(description: 'Generate the HTML PHPUnit code coverage report (stored in var/coverage)')]
function coverage(SymfonyStyle $io): void
{
    $io->title(__FUNCTION__);
    run('vendor/bin/simple-phpunit', quiet: false);
    $io->writeln('');
    $io->success('Done!');
}






/*

## —— Tests ✅ —————————————————————————————————————————————————————————————————
test: ## Run all PHPUnit tests
@vendor/bin/simple-phpunit

coverage: ## Generate the HTML PHPUnit code coverage report (stored in var/coverage)
	@XDEBUG_MODE=coverage php -d xdebug.enable=1 -d memory_limit=-1 vendor/bin/simple-phpunit --coverage-html=var/coverage

cov-report: ## Open the PHPUnit code coverage report (var/coverage/index.html)
	@open var/coverage/index.html

*/