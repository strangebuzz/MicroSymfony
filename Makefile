SHELL = sh
.DEFAULT_GOAL = help

## —— 🎶 The MicroSymfony Makefile 🎶 ——————————————————————————————————————————
help: ## Outputs this help screen
	@grep -E '(^[a-zA-Z0-9_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}{printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'
.PHONY: help start stop test coverage cov-report stan fix-php cs ci


## —— Symfony binary 💻 ————————————————————————————————————————————————————————
start: ## Serve the application with the Symfony binary
	@symfony serve --daemon

stop: ## Stop the web server
	@symfony server:stop


## —— Tests ✅ —————————————————————————————————————————————————————————————————
test: ## Run all PHPUnit tests
	@vendor/bin/simple-phpunit

coverage: ## Generate the HTML PHPUnit code coverage report (stored in var/coverage)
	@XDEBUG_MODE=coverage php -d xdebug.enable=1 -d memory_limit=-1 vendor/bin/simple-phpunit --coverage-html=var/coverage

cov-report: ## Open the PHPUnit code coverage report (var/coverage/index.html)
	@open var/coverage/index.html


## —— Coding standards ✨ ——————————————————————————————————————————————————————
stan: ## Run PHPStan
	@vendor/bin/phpstan analyse -c phpstan.neon --memory-limit 1G -vvv --xdebug

fix-php: ## Fix PHP files with php-cs-fixer (ignore PHP 8.2 warning)
	@PHP_CS_FIXER_IGNORE_ENV=1 vendor/bin/php-cs-fixer fix --allow-risky=yes

cs: ## Run all CS checks
cs: fix-php stan

ci: ## Run CI locally
ci: cs test