SHELL = sh
.DEFAULT_GOAL = help

## —— 🎶 The MicroSymfony Makefile 🎶 ——————————————————————————————————————————
help: ## Outputs this help screen
	@grep -E '(^[a-zA-Z0-9_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}{printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'
.PHONY: help start stop go-prod go-dev purge test coverage cov-report stan fix-php lint-php lint-container lint-twig lint-yaml cs lint ci deploy
.PHONY: version-php version-composer version-symfony version-phpunit version-phpstan version-php-cs-fixer check-requirements

## —— Symfony binary 💻 ————————————————————————————————————————————————————————
start: ## Serve the application with the Symfony binary
	@symfony serve --daemon

stop: ## Stop the web server
	@symfony server:stop


## —— Symfony 🎶  ——————————————————————————————————————————————————————————————
go-prod: ## Switch to the production environment
	@cp .env.local.dist .env.local
	# uncomment this line to optimize the auto-loading of classes in the prod env
	#@composer dump-autoload --no-dev --classmap-authoritative
	@bin/console asset-map:compile

go-dev: ## Switch to the development environment
	@rm -f .env.local
	@rm -rf ./public/assets/*
	#@composer dump-autoload

warmup: ## Warmup the dev cache for the static analysis
	@bin/console c:w --env=dev

purge: ## Purge all Symfony cache and logs
	@rm -rf ./var/cache/* ./var/logs/* ./var/coverage/*


## —— Tests ✅ —————————————————————————————————————————————————————————————————
test: ## Run all PHPUnit tests
	@vendor/bin/phpunit

coverage: ## Generate the HTML PHPUnit code coverage report (stored in var/coverage)
coverage: purge
	@XDEBUG_MODE=coverage php -d xdebug.enable=1 -d memory_limit=-1 vendor/bin/phpunit --coverage-html=var/coverage
	@php bin/coverage-checker.php var/coverage/clover.xml 100

cov-report: var/coverage/index.html ## Open the PHPUnit code coverage report (var/coverage/index.html)
	@open var/coverage/index.html


## —— Coding standards/lints ✨ ————————————————————————————————————————————————
stan: ## Run PHPStan
	@vendor/bin/phpstan analyse -c phpstan.neon --memory-limit 1G -vvv

fix-php: ## Fix PHP files with php-cs-fixer (ignore PHP 8.2 warning)
	@PHP_CS_FIXER_IGNORE_ENV=1 vendor/bin/php-cs-fixer fix --allow-risky=yes $(PHP_CS_FIXER_ARGS)

lint-php: ## Lint PHP files with php-cs-fixer (report only)
lint-php: PHP_CS_FIXER_ARGS=--dry-run
lint-php: fix-php

lint-container: ## Lint the Symfony DI container
	@bin/console lint:container

lint-twig: ## Lint Twig files
	@bin/console lint:twig templates/

lint-yaml: ## Lint YAML files
	@bin/console lint:yaml --parse-tags config/

cs: ## Run all CS checks
cs: fix-php stan

lint: ## Run all lints
lint: lint-php lint-container lint-twig lint-yaml

ci: ## Run CI locally
ci: coverage warmup cs lint


## —— Other tools and helpers 🔨 ———————————————————————————————————————————————
versions: version-php version-composer version-symfony version-phpunit version-phpstan version-php-cs-fixer ## Output current stack versions
version-php:
	@echo   '—— PHP ————————————————————————————————————————————————————————————'
	@php -v
version-composer:
	@echo '\n—— Composer ———————————————————————————————————————————————————————'
	@composer --version
version-symfony:
	@echo '\n—— Symfony ————————————————————————————————————————————————————————'
	@bin/console --version
version-phpunit:
	@echo '\n—— PHPUnit ————————————————————————————————————————————————————————'
	@vendor/bin/phpunit --version
version-phpstan:
	@echo '—— PHPStan ——————————————————————————————————————————————————————————'
	@vendor/bin/phpstan --version
version-php-cs-fixer:
	@echo '\n—— php-cs-fixer ———————————————————————————————————————————————————'
	@vendor/bin/php-cs-fixer --version
	@echo

check-requirements: ## Checks requirements for running Symfony
	@vendor/bin/requirements-checker


## —— Deploy & Prod 🚀 —————————————————————————————————————————————————————————
deploy: ## Simple manual deploy on VPS (this is to update the demo site https://microsymfony.ovh/)
	@git pull
	@composer install
	@chown -R www-data: var/*
	@cp .env.local.dist .env.local
	@composer dump-env prod
	@bin/console asset-map:compile
