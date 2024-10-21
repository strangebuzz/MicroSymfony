# MicroSymfony 🎶

[![Latest Version](https://img.shields.io/packagist/v/strangebuzz/microsymfony.svg?style=flat-square)](https://packagist.org/packages/strangebuzz/microsymfony)
[![Software License](https://img.shields.io/badge/License-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build Status (GitHub)](https://img.shields.io/github/actions/workflow/status/strangebuzz/microsymfony/symfony.yml?branch=main&style=flat-square)](https://github.com/strangebuzz/microsymfony/actions?query=workflow%3ASymfony+branch%3Amain)
[![Code Coverage](https://scrutinizer-ci.com/g/strangebuzz/MicroSymfony/badges/coverage.png?b=main)](https://scrutinizer-ci.com/g/strangebuzz/MicroSymfony/?branch=main)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/strangebuzz/MicroSymfony/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/strangebuzz/MicroSymfony/?branch=main)
[![Quality Score](https://img.shields.io/scrutinizer/g/strangebuzz/microsymfony.svg?style=flat-square)](https://scrutinizer-ci.com/g/strangebuzz/microsymfony)


## About 🖋 

MicroSymfony is a [Symfony 7.1](https://symfony.com/blog/symfony-7-1-curated-new-features)
application skeleton on steroids, ready to use.

I have made a long blog post explaining all it contains; it will be the reference
for documentation. 
I'll update it when needed:

* [Introducing the MicroSymfony application template](https://www.strangebuzz.com/en/blog/introducing-the-microsymfony-application-template)

If you want to use the last Symfony **6.4 LTS** version in your `composer.json`
file, replace all occurrences of `7.1` with `6.4` and run `composer up`.


## Table of Contents 📖

* [About](#about-)
* [Demos](#demos-)
* [Quick-start](#quick-start-)
  * [With the Symfony binary](#with-the-symfony-binary-)
  * [With FrankenPHP](#with-frankenphp-)
* [Requirements](#requirements-)
  * [Optional requirements](#optional-requirements-)
* [Stack](#stack-)
* [Features](#features-)
* [Feature branches](#feature-branches-)
  * [Infrastructure](#infrastructure) 
  * [Database](#database-) 
  * [Tooling](#tooling-)
* [Notes](#notes-)
* [Other good practices](#other-good-practices-)
* [References](#references-)


## Demos 🌈

Because a live demo is always better than all explanations:

* Live demo at [https://microsymfony.ovh](https://microsymfony.ovh)
* Live demo powered by [FrankenPHP](https://frankenphp.dev/) at [https://frankenphp.microsymfony.ovh](https://frankenphp.microsymfony.ovh)


## Quick-start ⚡

### With the Symfony binary 🎶 

You must have the [Symfony binary](https://symfony.com/download#step-1-install-symfony-cli)
and [composer](https://getcomposer.org/) installed locally.

To create a new project from the GitHub template, run:

    composer create-project strangebuzz/microsymfony && cd microsymfony

Then start the PHP server with make:

    make start

Or with Castor:

    castor start

Open [https://127.0.0.1:8000](https://127.0.0.1:8000) (considering your 8000 port is free) and enjoy! 🙂


### With FrankenPHP 🧟‍

We can also use [FrankenPHP](https://frankenphp.dev/) to run MicroSymfony.
You must have [Docker](https://www.docker.com/) installed locally.

Create a new project from the GitHub template, run:

    docker run --rm -it -v $PWD:/app composer:latest create-project strangebuzz/microsymfony && cd microsymfony

Install the [FrankenPHP Symfony runtime](https://github.com/php-runtime/frankenphp-symfony):

    docker run --rm -it -v $PWD:/app composer:latest require runtime/frankenphp-symfony

Then run:

    docker run \
        -e FRANKENPHP_CONFIG="worker ./public/index.php" \
        -e APP_RUNTIME=Runtime\\FrankenPhpSymfony\\Runtime \
        -v $PWD:/app \
        -p 80:80 -p 443:443 \
        -d \
        dunglas/frankenphp

Open [https://localhost](https://localhost) and enjoy! 🙂

**PS**: On Windows, replace `$PWD` with `"%cd%"`.

You can also directly use the [FrankenPHP](https://github.com/strangebuzz/MicroSymfony/tree/frankenphp) branch.


## Requirements ⚙

* [PHP 8.2](https://www.php.net/releases/8.2/en.php) (also works with [PHP 8.3](https://www.php.net/releases/8.3/en.php))
* The [Symfony CLI](https://symfony.com/download)


### Optional requirements ⚙
 
* The [Xdebug](https://xdebug.org/) PHP extension if you want to run the code coverage report
* [Castor](https://github.com/jolicode/castor) task runner if you don't want to use
  [Make](https://www.gnu.org/software/make/) and its [Makefile](https://github.com/strangebuzz/MicroSymfony/blob/main/Makefile) 


## Stack 🔗

* [Symfony 7.1](https://symfony.com/7)
* [Twig 3.8](https://twig.symfony.com)
* Hotwired [stimulus 3.2](https://stimulus.hotwired.dev/) and [Turbo 8.0](https://turbo.hotwired.dev/)
* [PHPUnit 11.0](https://phpunit.de/announcements/phpunit-11.html)
* The classless [BareCSS](http://barecss.com) CSS framework

**PS**: A [fork of BareCSS](https://github.com/strangebuzz/BareCSS/) was created
to fix some issues as the project is not maintained anymore.


## Features 🚀

**MicroSymfony** ships these features, ready to use:

* Two task runners
  * [Make](https://www.gnu.org/software/make/) ([source](https://github.com/strangebuzz/MicroSymfony/blob/main/Makefile)) ([demo](https://www.strangebuzz.com/en/blog/introducing-the-microsymfony-application-template#h3_4_1))
  * [Castor](https://github.com/jolicode/castor) ([source](https://github.com/strangebuzz/MicroSymfony/blob/main/castor.php)) ([demo](https://www.strangebuzz.com/en/blog/introducing-the-microsymfony-application-template#h3_4_2))
* Static analysis with [PHPStan](https://github.com/phpstan/phpstan)
  * [Configuration](https://github.com/strangebuzz/MicroSymfony/blob/main/phpstan.neon)
* Coding standards with [php-cs-fixer](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer)
  * [Configuration](https://github.com/strangebuzz/MicroSymfony/blob/main/.php-cs-fixer.dist.php)
* Tests ([demo](https://www.strangebuzz.com/en/blog/introducing-the-microsymfony-application-template#h2_7))
  * Unit test [example](https://github.com/strangebuzz/MicroSymfony/blob/main/tests/Unit/Helper/StringHelperTest.php) 
  * Integration test [example](https://github.com/strangebuzz/MicroSymfony/blob/main/tests/Integration/Twig/Extension/MarkdownExtensionTest.php) 
  * Functional test [example](https://github.com/strangebuzz/MicroSymfony/blob/main/tests/Functional/Controller/HelloWorldTest.php) 
  * API test [example](https://github.com/strangebuzz/MicroSymfony/blob/main/tests/Api/Controller/SlugifyActionTest.php) 
  * E2E test [example](https://github.com/strangebuzz/MicroSymfony/blob/main/tests/E2E/Controller/AppControllerTest.php)
* Code coverage at 100% (configurable threshold)
  * [Coverage report on Scrutinizer](https://scrutinizer-ci.com/g/strangebuzz/MicroSymfony/code-structure/main/code-coverage/src/)
* GitHub CI ([actions](https://github.com/strangebuzz/MicroSymfony/actions))
  * [Tests job output](https://github.com/strangebuzz/MicroSymfony/actions/runs/11305753729/job/31445591745)
  * [Lint job output](https://github.com/strangebuzz/MicroSymfony/actions/runs/11305753729/job/31445591463)
  * [Security job output](https://github.com/strangebuzz/MicroSymfony/actions/runs/11305753729/job/31445591659)
* Asset mapper+Stimulus ([documentation](https://symfony.com/doc/current/frontend/asset_mapper.html))
  * Vanilla Js ([source](https://github.com/strangebuzz/MicroSymfony/blob/main/assets/controllers/hello_controller.js)) ([demo](https://microsymfony.ovh/stimulus))
  * Fetch on a JSON endpoint of the application ([source](https://github.com/strangebuzz/MicroSymfony/blob/main/assets/controllers/api_controller.js)) ([demo](https://microsymfony.ovh/stimulus)) 
* A custom error template
  * [Source](https://github.com/strangebuzz/MicroSymfony/blob/main/templates/bundles/TwigBundle/Exception/error.html.twig)
  * [Demo](https://microsymfony.ovh/404) 


## Feature branches 🚅

[Feature branches](https://github.com/strangebuzz/MicroSymfony/pulls?q=is%3Apr+is%3Aopen+label%3A%22feature+branch%22)
are not merged in the main branch but are used to integrate a new vendor library
or make a [POC](https://en.wikipedia.org/wiki/Proof_of_concept).
For example, have you ever dreamed of testing [Eloquent](https://laravel.com/docs/11.x/eloquent#introduction),
the Laravel ORM, on a Symfony project?
Then clone the `eloquent` branch and run `composer install && make load-fixtures`.

### Infrastructure

* FrankenPHP ([PR](https://github.com/strangebuzz/MicroSymfony/pull/54), [branch](https://github.com/strangebuzz/MicroSymfony/tree/frankenphp), rebased on 2024-09-26)
* Symfony-docker ([PR](https://github.com/strangebuzz/MicroSymfony/pull/98), [branch](https://github.com/strangebuzz/MicroSymfony/tree/symfony-docker), rebased on 2024-10-20)

### Database 💽

These « database » branches aim to display a list of records coming from a [SQLite](https://www.sqlite.org/)
database.
 
* Doctrine DBAL ([PR](https://github.com/strangebuzz/MicroSymfony/pull/72), [branch](https://github.com/strangebuzz/MicroSymfony/tree/doctrine-dbal), rebased on 2024-10-06)
* Eloquent ORM ([PR](https://github.com/strangebuzz/MicroSymfony/pull/65), [branch](https://github.com/strangebuzz/MicroSymfony/tree/eloquent), rebased on 2024-10-13)

### Tooling 🔨

* Taskfile ([PR](https://github.com/strangebuzz/MicroSymfony/pull/86), [branch](https://github.com/jmsche/MicroSymfony/tree/taskfile), rebased on 2024-10-11)
* TwigStan ([PR](https://github.com/strangebuzz/MicroSymfony/pull/95), [branch](https://github.com/strangebuzz/MicroSymfony/tree/twigstan), rebased on 2024-10-21)

These branches will be rebased after each release so they are always up to date.


## Notes 📒

Turbo forms are disabled in [assets/app.js](https://github.com/strangebuzz/MicroSymfony/blob/main/assets/app.js).
To enable the feature for a given form, add the `data-turbo="true"` attribute to it. 
Or change the parameter `Turbo.setFormMode` to `on` to activate the feature globally.
In both cases, your controller code has to be [modified accordingly](https://symfony.com/bundles/ux-turbo/current/index.html#3-form-response-code-changes).


## Other good practices 👌

* Using strict types in all PHP files ([source](https://github.com/strangebuzz/MicroSymfony/blob/main/src/Controller/SlugifyAction.php#L3))
* Using the ADR pattern in an action controller ([source](https://github.com/strangebuzz/MicroSymfony/blob/main/src/Controller/SlugifyAction.php)) ([doc](https://symfony.com/doc/current/controller/service.html#invokable-controllers))
* The [composer.json](https://github.com/strangebuzz/MicroSymfony/blob/main/composer.json) 
  file is normalized with [ergebnis/composer-normalize](https://github.com/ergebnis/composer-normalize)
* Use of the [composer bin plugin](https://github.com/bamarni/composer-bin-plugin)
  to install and run [php-cs-fixer](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer)


## References 📚

* [A better ADR pattern for your Symfony controllers](https://www.strangebuzz.com/en/blog/a-better-adr-pattern-for-your-symfony-controllers) (strangebuzz.com) (coming soon)
* [My Taskfile configuration for Symfony](https://jmsche.fr/en/blog/my-taskfile-configuration-for-symfony) (jmsche.fr)
* [You should be using PHPStans bleeding edge](https://backendtea.com/post/use-phpstan-bleeding-edge/) (backendtea.com)
* [A Good Naming Convention for Routes, Controllers and Templates?](https://jolicode.com/blog/a-good-naming-convention-for-routes-controllers-and-templates) (jolicode.com)
* [Front-end application development, Symfony-style(s)](https://dunglas.dev/2024/04/front-end-application-development-symfony-styles/) (dunglas.dev)
* [Automated Test Coverage Checks with Travis, PHPUnit for Github Pull Requests](https://ocramius.github.io/blog/automated-code-coverage-check-for-github-pull-requests-with-travis/) (ocramius.github.io) 
* [Installing and using php-cs-fixer](https://www.strangebuzz.com/en/blog/installing-and-using-php-cs-fixer) (strangebuzz.com)
* [Castor, a journey across the sea of task runners](https://jolicode.com/blog/castor-a-journey-across-the-sea-of-task-runners) (jolicode.com)
* [Initializing your Symfony project with solid foundations](https://www.strangebuzz.com/en/blog/initializing-your-symfony-project-with-solid-foundations) (strangebuzz.com)
* [Organizing your Symfony project tests](https://www.strangebuzz.com/en/blog/organizing-your-symfony-project-tests) (strangebuzz.com)
* [What are your Symfony best practices?](https://www.strangebuzz.com/en/blog/what-are-your-symfony-best-practices) (strangebuzz.com)
* [Setting a CI/CD workflow for a Symfony project thanks to the GitHub actions](https://www.strangebuzz.com/en/blog/setting-a-ci-cd-workflow-for-a-symfony-project-thanks-to-the-github-actions) (strangebuzz.com)
* [The Symfony Framework Best Practices](https://symfony.com/doc/current/best_practices.html) (symfony.com)
