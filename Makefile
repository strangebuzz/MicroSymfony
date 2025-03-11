SHELL = sh
.DEFAULT_GOAL = help

# change your prod domain here
DOMAIN = microsymfony.ovh

# modify the code coverage threshold here
COVERAGE_THRESHOLD = 100

## —— 🎶 The MicroSymfony Makefile 🎶 ——————————————————————————————————————————
help: ## Outputs this help screen
	@grep -E '(^[a-zA-Z0-9_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}{printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'
.PHONY: help start stop go-prod go-dev purge test test-api test-e2e test-functional test-integration test-unit coverage cov-report stan fix-php fix-js-css lint-php lint-js-css lint-container lint-twig lint-yaml fix lint ci deploy
.PHONY: version-php version-composer version-symfony version-phpunit version-phpstan version-php-cs-fixer check-requirements le-renew


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
test: ## Run tests with optional suite, filter and options (to debug use "make test options=--debug")
	@$(eval testsuite ?= 'api,e2e,functional,integration,unit') # Run all suites by default, to run a specific suite see other "test-*" targets, eg: "make test-unit"
	@$(eval filter ?= '.')                                      # Use this parameter to spot a given test,                                       eg: "make test filter=testSlugify"
	@$(eval options ?= --stop-on-failure)                       # Use this use other options,                                                    eg: "make test options=--testdox"
	@vendor/bin/phpunit --testsuite=$(testsuite) --filter=$(filter) $(options)

test-api: ## Run API tests only
test-api: testsuite=api
test-api: test

test-e2e: ## Run E2E tests only
test-e2e: testsuite=e2e
test-e2e: test

test-functional: ## Run functional tests only
test-functional: testsuite=functional
test-functional: test

test-integration: ## Run integration tests only
test-integration: testsuite=integration
test-integration: test

test-unit: ## Run unit tests only
test-unit: testsuite=unit
test-unit: test

coverage: ## Generate the HTML PHPUnit code coverage report (stored in var/coverage)
coverage: purge
	@XDEBUG_MODE=coverage php -d xdebug.enable=1 -d memory_limit=-1 vendor/bin/phpunit --coverage-html=var/coverage --coverage-clover=var/coverage/clover.xml
	@php bin/coverage-checker.php var/coverage/clover.xml $(COVERAGE_THRESHOLD)

cov-report: var/coverage/index.html ## Open the PHPUnit code coverage report (var/coverage/index.html)
	@open var/coverage/index.html


## —— Coding standards/lints ✨ ————————————————————————————————————————————————
stan: var/cache/dev/App_KernelDevDebugContainer.xml ## Run the PHPStan static analysis
	@vendor/bin/phpstan analyse -c phpstan.neon --memory-limit 1G -vv

# PHPStan needs the dev/debug cache
var/cache/dev/App_KernelDevDebugContainer.xml:
	APP_DEBUG=1 APP_ENV=dev bin/console cache:warmup

fix-php: ## Fix PHP files with php-cs-fixer (ignore PHP version warning)
	@PHP_CS_FIXER_IGNORE_ENV=1 vendor/bin/php-cs-fixer fix $(PHP_CS_FIXER_ARGS)

fix-js-css: ## Format JS/CSS files with Biome
	@bin/console biomejs:check . --write

lint-php: ## Lint PHP files with php-cs-fixer (report only)
lint-php: PHP_CS_FIXER_ARGS=--dry-run
lint-php: fix-php

lint-js-css: ## Lint JS/CSS files with Biome
	@bin/console biomejs:check .

lint-container: ## Lint the Symfony DI container
	@bin/console lint:container

lint-twig: ## Lint Twig files
	@bin/console lint:twig templates/

lint-yaml: ## Lint YAML files
	@bin/console lint:yaml --parse-tags config/

fix: ## Run all fixers
fix: fix-php fix-js-css

lint: ## Run all linters
lint: stan lint-php lint-container lint-twig lint-yaml

ci: ## Run CI locally
ci: coverage warmup lint


## —— Other tools and helpers 🔨 ———————————————————————————————————————————————
versions: version-make version-php version-composer version-symfony version-phpunit version-phpstan version-php-cs-fixer ## Output current stack versions
version-make:
	@echo   '—— Make ———————————————————————————————————————————————————————————'
	@$(MAKE) --version
version-php:
	@echo   '\n—— PHP ——————————————————————————————————————————————————————————'
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
	@PHP_CS_FIXER_IGNORE_ENV=1 vendor/bin/php-cs-fixer --version
	@echo

check-requirements: ## Checks requirements for running Symfony
	@vendor/bin/requirements-checker


## —— Deploy & Prod 🚀 —————————————————————————————————————————————————————————
deploy: ## Simple manual deploy on a VPS (this is to update the demo site https://microsymfony.ovh/)
	@git pull
	@composer install -n
	@chown -R www-data: ./var/*
	@cp .env.local.dist .env.local
	@composer dump-env prod -n
	@bin/console asset-map:compile

le-renew: ## Renew Let's Encrypt HTTPS certificates
	@certbot --apache -d $(DOMAIN) -d www.$(DOMAIN)
