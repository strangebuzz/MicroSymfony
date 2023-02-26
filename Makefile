SHELL = sh
.DEFAULT_GOAL = help

## —— 🎶 The Symfony micro Makefile 🎶 —————————————————————————————————————————
help: ## Outputs this help screen
	@grep -E '(^[a-zA-Z0-9_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}{printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'
.PHONY: help start stop stan fix-php cs

## —— Symfony binary 💻 ————————————————————————————————————————————————————————
start: ## Serve the application with the Symfony binary with HTTPS support
	@symfony serve --daemon

stop: ## Stop the web server
	@symfony server:stop

## —— Coding standards ✨ ——————————————————————————————————————————————————————
stan: ## Run PHPStan
	@./vendor/bin/phpstan analyse -c phpstan.neon --memory-limit 1G -vvv

fix-php: ## Fix PHP files with php-cs-fixer (ignore PHP 8.2 warning)
	@PHP_CS_FIXER_IGNORE_ENV=1 ./vendor/bin/php-cs-fixer fix --allow-risky=yes

cs: ## Run all checks
cs: fix-php stan
