# Symfony micro

A template to initialize an application to use Symfony as a microframework.


## What does it ship?

* Symfony 6.2
* Twig 3


## What it doesn't ship?

* The debug toolbar
* Doctrine


# Requirements

* PHP 8.1
* The [Symfony CLI](https://symfony.com/download)


# Installation & first run

    composer install
    make start

Then open https://127.0.0.1:8000/

The port can change if 8000 is already used.


## Dev-tools 
 
* php-cs-fixer with the [Symfony ruleset and strict types](.php-cs-fixer.dist.php)
* PHPStan at [maximum level](phpstan.neon)
* A simple [Makefile](./Makefile)