SHELL = sh
.DEFAULT_GOAL = help

## —— 🎶 The MicroSymfony Makefile 🎶 ——————————————————————————————————————————
help: ## Outputs this help screen
	@grep -E '(^[a-zA-Z0-9_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}{printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'
.PHONY: help start stop test coverage cov-report stan fix-php lint-container lint-twig lint-yaml cs lint ci deploy


## —— Symfony binary 💻 ————————————————————————————————————————————————————————
start: ## Serve the application with the Symfony binary
	@symfony serve --daemon

stop: ## Stop the web server
	@symfony server:stop


## —— Tests ✅ —————————————————————————————————————————————————————————————————
test: ## Run all PHPUnit tests
	@vendor/bin/simple-phpunit

coverage: ## Generate the HTML PHPUnit code coverage report (stored in var/coverage)
	@rm -rf ./var/cache/test
	@XDEBUG_MODE=coverage php -d xdebug.enable=1 -d memory_limit=-1 vendor/bin/simple-phpunit --coverage-html=var/coverage
	@php bin/coverage-checker.php var/coverage/clover.xml 100

cov-report: ## Open the PHPUnit code coverage report (var/coverage/index.html)
	@open var/coverage/index.html


## —— Coding standards/lints ✨ ————————————————————————————————————————————————
stan: ## Run PHPStan
	@vendor/bin/phpstan analyse -c phpstan.neon --memory-limit 1G -vvv --xdebug

fix-php: ## Fix PHP files with php-cs-fixer (ignore PHP 8.2 warning)
	@PHP_CS_FIXER_IGNORE_ENV=1 vendor/bin/php-cs-fixer fix --allow-risky=yes

lint-container: ## Lint the Symfony DI container
	@bin/console lint:container

lint-twig: ## Lint Twig files
	@bin/console lint:twig templates/

lint-yaml: ## Lint YAML files
	@bin/console lint:yaml --parse-tags config/

cs: ## Run all CS checks
cs: fix-php stan

lint: ## Run all lints
lint: lint-container lint-twig lint-yaml

ci: ## Run CI locally
ci: test cs lint


## —— Deploy & Prod 🚀 —————————————————————————————————————————————————————————
deploy: ## Simple manual deploy on VPS (this is to update the demo site https://microsymfony.ovh/)
	@git pull
	@composer install
	@chown -R www-data: var/*
