# MicroSymfony 🎶

[![Latest Version](https://img.shields.io/packagist/v/strangebuzz/microsymfony.svg?style=flat-square)](https://packagist.org/packages/strangebuzz/microsymfony)
[![PHP Version Require](https://poser.pugx.org/strangebuzz/microsymfony/require/php?style=flat-square)](https://packagist.org/packages/strangebuzz/microsymfony)
[![level](https://img.shields.io/badge/level-max-success?style=flat-square&logo=data:image/png;base64,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)](https://github.com/strangebuzz/MicroSymfony/actions)
[![Software License](https://img.shields.io/badge/License-MIT-brightgreen.svg?style=flat-square)](https://github.com/strangebuzz/MicroSymfony/blob/main/LICENSE)
[![Build Status (GitHub)](https://img.shields.io/github/actions/workflow/status/strangebuzz/microsymfony/symfony.yml?branch=main&style=flat-square)](https://github.com/strangebuzz/microsymfony/actions?query=workflow%3ASymfony+branch%3Amain)
[![Code Coverage](https://scrutinizer-ci.com/g/strangebuzz/MicroSymfony/badges/coverage.png?b=main)](https://scrutinizer-ci.com/g/strangebuzz/MicroSymfony/code-structure/main/code-coverage/src/)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/strangebuzz/MicroSymfony/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/strangebuzz/MicroSymfony/?branch=main)
[![Quality Score](https://img.shields.io/scrutinizer/g/strangebuzz/microsymfony.svg?style=flat-square)](https://scrutinizer-ci.com/g/strangebuzz/microsymfony)


## About 🖋 

MicroSymfony is a [Symfony 8.0](https://symfony.com/8) application skeleton on steroids,
ready to use.

I have made a long blog post explaining the philosophy behind it and how to use it:

* [Introducing the MicroSymfony application template](https://www.strangebuzz.com/en/blog/introducing-the-microsymfony-application-template)


## Table of Contents 📖

* [Demos](#demos-)
* [Quick-start](#quick-start-)
  * [With the Symfony binary](#with-the-symfony-binary-)
  * [With FrankenPHP](#with-frankenphp-)
  * [With Laragon](#with-laragon)
* [Requirements](#requirements-)
  * [Optional requirements](#optional-requirements-)
* [Stack](#stack-)
* [Features](#features-)
* [Feature branches](#feature-branches-)
  * [Infrastructure](#infrastructure) 
  * [Database](#database-) 
  * [Tooling](#tooling-)
* [Notes](#notes-)
  * [Symfony UX](#symfony-ux)
  * [PHP configuration files](#php-configuration-files)
* [Other good practices](#other-good-practices-)
* [ADR](#adr-)
* [References](#references-)
* [Contributing](#contributing-)
* [Security](#security-)
* [Credits](#credits-)
* [License](#license-)
* [Built with MicroSymfony](#built-with-microsymfony-)


## Demos 🌈

Because a live demo is always better than all explanations:

* Live demo at [https://microsymfony.ovh](https://microsymfony.ovh)
* Live demo powered by [FrankenPHP](https://frankenphp.dev/) at [https://frankenphp.microsymfony.ovh](https://frankenphp.microsymfony.ovh)


## Quick-start ⚡

### With the Symfony binary 🎶 

You must have the [Symfony binary](https://symfony.com/download#step-1-install-symfony-cli)
and [composer](https://getcomposer.org/) installed locally.

To create a new project from the last tag, run:

    composer create-project strangebuzz/microsymfony && cd microsymfony

Then start the PHP server with make:

    make start

Or with Castor:

    castor start

Open [https://127.0.0.1:8000](https://127.0.0.1:8000) (considering your 8000 port is free) and enjoy! 🙂

> **PS**: You can also use the green button "[Use this template ⇩](https://github.com/new?template_name=MicroSymfony&template_owner=strangebuzz)"
at the top right of the GitHub project homepage.
It creates a new repository from the main branch instead of the last release.
I guarantee that all commits on the main branch are stable; you can verify that
the associated CI jobs are ✅.  

### With FrankenPHP 🧟‍

We can also use [FrankenPHP](https://frankenphp.dev/) to run MicroSymfony.
You must have [Docker](https://www.docker.com/) installed locally.

Create a new project from the GitHub template, run:

    docker run --rm -it -v $PWD:/app composer:latest create-project strangebuzz/microsymfony && cd microsymfony

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

### With Laragon

Check out the specific [documentation](https://github.com/strangebuzz/MicroSymfony/blob/main/docs/laragon.md).


## Requirements ⚙

* [PHP 8.4](https://www.php.net/releases/8.4/en.php) (also works with [PHP 8.5](https://www.php.net/releases/8.5/en.php))
* The [Symfony CLI](https://symfony.com/download)


### Optional requirements 🚦
 
* The [Xdebug](https://xdebug.org/) PHP extension if you want to run the code coverage report
* [Castor](https://github.com/jolicode/castor) task runner if you would rather not use
  [Make](https://www.gnu.org/software/make/) and its [Makefile](https://github.com/strangebuzz/MicroSymfony/blob/main/Makefile) 


## Stack 🔗

* [PHP 8.4](https://www.php.net/releases/8.4/en.php) or PHP [8.5](https://www.php.net/releases/8.5/en.php)
* [Symfony 8.0](https://symfony.com/8)
* [Twig 3](https://twig.symfony.com)
* [Hotwired](https://hotwired.dev/) [Stimulus 3.2](https://stimulus.hotwired.dev/) and [Turbo 8.0](https://turbo.hotwired.dev/)
* [PHPUnit 11.5](https://phpunit.de/announcements/phpunit-11.html)
* [Pico CSS 2.0](https://picocss.com)


## Features 🚀

**MicroSymfony** ships these features, ready to use:

* Two task runners
  * [Make](https://www.gnu.org/software/make/) ([source](https://github.com/strangebuzz/MicroSymfony/blob/main/Makefile)) ([demo](https://www.strangebuzz.com/en/blog/introducing-the-microsymfony-application-template#h3_4_1))
  * [Castor](https://github.com/jolicode/castor) ([source](https://github.com/strangebuzz/MicroSymfony/blob/main/castor.php)) ([demo](https://www.strangebuzz.com/en/blog/introducing-the-microsymfony-application-template#h3_4_2))
* Static analysis with [PHPStan 2](https://github.com/phpstan/phpstan)
  * [Configuration](https://github.com/strangebuzz/MicroSymfony/blob/main/phpstan.neon)
* Coding standards with [php-cs-fixer](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer)
  * [Configuration](https://github.com/strangebuzz/MicroSymfony/blob/main/.php-cs-fixer.dist.php)
* Tests ([demo](https://www.strangebuzz.com/en/blog/introducing-the-microsymfony-application-template#h2_7))
  * Unit test [example](https://github.com/strangebuzz/MicroSymfony/blob/main/tests/Unit/Helper/StringHelperTest.php) 
  * Integration test [example](https://github.com/strangebuzz/MicroSymfony/blob/main/tests/Integration/Twig/Extension/MarkdownExtensionTest.php) 
  * Functional test [example](https://github.com/strangebuzz/MicroSymfony/blob/main/tests/Functional/Controller/ComposerActionTest.php) 
  * API test [example](https://github.com/strangebuzz/MicroSymfony/blob/main/tests/Api/Controller/SlugifyActionTest.php) 
  * E2E test [example](https://github.com/strangebuzz/MicroSymfony/blob/main/tests/E2E/Controller/AppControllerTest.php)
* Code coverage at 100% (configurable threshold)
  * [Coverage report on Scrutinizer](https://scrutinizer-ci.com/g/strangebuzz/MicroSymfony/code-structure/main/code-coverage/src/)
* GitHub CI ([actions](https://github.com/strangebuzz/MicroSymfony/actions))
  * [Tests job output](https://github.com/strangebuzz/MicroSymfony/actions/runs/20644800370/job/59281198393?pr=200)
  * [Lint job output](https://github.com/strangebuzz/MicroSymfony/actions/runs/20644800370/job/59281198381?pr=200)
  * [Security job output](https://github.com/strangebuzz/MicroSymfony/actions/runs/20644800370/job/59281198382?pr=200)
* Asset mapper+Stimulus ([documentation](https://symfony.com/doc/current/frontend/asset_mapper.html))
  * Vanilla Js ([source](https://github.com/strangebuzz/MicroSymfony/blob/main/assets/controllers/hello_controller.js)) ([demo](https://microsymfony.ovh/stimulus))
  * Fetch on a JSON endpoint of the application ([source](https://github.com/strangebuzz/MicroSymfony/blob/main/assets/controllers/api_controller.js)) ([demo](https://microsymfony.ovh/stimulus)) 
* A custom error template
  * [Source](https://github.com/strangebuzz/MicroSymfony/blob/main/templates/bundles/TwigBundle/Exception/error.html.twig)
  * [Demo](https://microsymfony.ovh/404) 


## Feature branches 🚅

[Feature branches](https://github.com/strangebuzz/MicroSymfony/pulls?q=is%3Apr+is%3Aopen+label%3A%22feature+branch%22)
are not merged in the main branch but are used to test the integration of a new
vendor library or make a [POC](https://en.wikipedia.org/wiki/Proof_of_concept).
For example, have you ever dreamed of testing [Eloquent](https://laravel.com/docs/11.x/eloquent#introduction),
the Laravel ORM, on a Symfony project?
Then clone the `eloquent` branch and run `composer install && make load-fixtures`.

### Infrastructure

* Symfony-docker ([PR](https://github.com/strangebuzz/MicroSymfony/pull/98), [branch](https://github.com/strangebuzz/MicroSymfony/tree/symfony-docker), rebased on 2024-11-17)

### Database 💽

These « database » branches aim to display a list of records from a [SQLite](https://www.sqlite.org/)
database.
 
* Doctrine DBAL ([PR](https://github.com/strangebuzz/MicroSymfony/pull/72), [branch](https://github.com/strangebuzz/MicroSymfony/tree/doctrine-dbal), rebased on 2025-02-21)
* Eloquent ORM ([PR](https://github.com/strangebuzz/MicroSymfony/pull/65), [branch](https://github.com/strangebuzz/MicroSymfony/tree/eloquent), rebased on 2024-11-17)

### Tooling 🔨

* Vite-Bundle ([PR](https://github.com/strangebuzz/MicroSymfony/pull/161), [branch](https://github.com/lhapaipai/MicroSymfony/tree/vite), rebased on 2025-02-11) ([demo](https://vite.microsymfony.ovh))
* Psalm ([PR](https://github.com/strangebuzz/MicroSymfony/pull/160), [branch](https://github.com/strangebuzz/MicroSymfony/tree/psalm), rebased on 2025-02-20)
* Taskfile ([PR](https://github.com/strangebuzz/MicroSymfony/pull/86), [branch](https://github.com/jmsche/MicroSymfony/tree/taskfile), rebased on 2024-12-04)
* TwigStan ([PR](https://github.com/strangebuzz/MicroSymfony/pull/95), [branch](https://github.com/strangebuzz/MicroSymfony/tree/twigstan), rebased on 2024-11-18)
* Twig-CS-Fixer ([PR](https://github.com/strangebuzz/MicroSymfony/pull/118), [branch](https://github.com/strangebuzz/MicroSymfony/tree/feat/use-twig-cs-fixer), rebased on 2025-12-30)

One will rebase those branches regularly so they are not too outdated.


## Notes 📒

### Symfony-UX

Turbo forms are disabled in [assets/app.js](https://github.com/strangebuzz/MicroSymfony/blob/main/assets/app.js).
To enable the feature for a given form, add the `data-turbo="true"` attribute to it. 
Or change the parameter `Turbo.setFormMode` to `on` to activate the feature globally.
In both cases, your controller code has to be [modified accordingly](https://symfony.com/bundles/ux-turbo/current/index.html#3-form-response-code-changes).

### PHP configuration files

If you install a new Symfony library, the Flex recipes can add YAML files to your
project.
These YAML files are loaded, but you can convert them to PHP like the other configuration
files.
Take examples on the other files in `config/packages` to see how to make the conversion.


## Other good practices 👌

* Using PHP configuration files instead of YAML ([source](https://github.com/strangebuzz/MicroSymfony/blob/main/config/services.php))
* Using strict types in all PHP files ([source](https://github.com/strangebuzz/MicroSymfony/blob/main/src/Controller/SlugifyAction.php#L3))
* Using the ADR pattern in an action controller ([source](https://github.com/strangebuzz/MicroSymfony/blob/main/src/Controller/HomeAction.php)) ([doc](https://symfony.com/doc/current/controller/service.html#invokable-controllers))
* The [composer.json](https://github.com/strangebuzz/MicroSymfony/blob/main/composer.json) 
  file is normalized with [ergebnis/composer-normalize](https://github.com/ergebnis/composer-normalize)
* Use of the [composer bin plugin](https://github.com/bamarni/composer-bin-plugin)
  to install and run [php-cs-fixer](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer)


## ADR 📝

ADR stands for [Architecture Design Records](https://adr.github.io/):

* [2025-12-29] Use the new PHP configuration ([PR](https://github.com/strangebuzz/MicroSymfony/pull/197))
* [2025-01-25] Include the FrankenPHP runtime by default ([PR](https://github.com/strangebuzz/MicroSymfony/pull/54))
* [2025-01-21] Add PHPUnit test suites ([PR](https://github.com/strangebuzz/MicroSymfony/pull/155))
* [2024-12-18] Use PicoCSS instead of BareCSS as the CSS framework ([PR](https://github.com/strangebuzz/MicroSymfony/pull/85))
* [2024-12-05] Convert all configuration files to PHP (fluent interface) ([PR](https://github.com/strangebuzz/MicroSymfony/pull/129))
* [2024-09-22] Use the ADR pattern for all controllers ([PR](https://github.com/strangebuzz/MicroSymfony/pull/58))


## References 📚

* [Running a Symfony app on a VPS with Docker and FrankenPHP](https://les-tilleuls.coop/en/blog/running-a-symfony-app-on-a-vps-with-docker-and-frankenphp) (les-tilleuls.coop)
* [How to Switch from YAML Configs to PHP Today with Symplify](https://tomasvotruba.com/blog/2020/07/27/how-to-switch-from-yaml-xml-configs-to-php-today-with-migrify/) (tomasvotruba.com)
* [PHPStan 2.0 Released With Level 10 and Elephpants!](https://phpstan.org/blog/phpstan-2-0-released-level-10-elephpants) (phpstan.org)
* [A better ADR pattern for your Symfony controllers](https://www.strangebuzz.com/en/blog/a-better-adr-pattern-for-your-symfony-controllers) (strangebuzz.com)
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


## Contributing 🤝 

Please see [CONTRIBUTING](https://github.com/strangebuzz/MicroSymfony/blob/main/CONTRIBUTING.md) and [CODE_OF_CONDUCT](https://github.com/strangebuzz/MicroSymfony/blob/main/CODE_OF_CONDUCT.md) for details.


## Security 🧯

Please see [SECURITY](https://github.com/strangebuzz/MicroSymfony/blob/main/SECURITY.md) for details.


## Credits 🙏

* [COil](https://github.com/COil) (primary maintainer)
* [All Contributors](https://github.com/strangebuzz/MicroSymfony/graphs/contributors)

<a href="https://github.com/strangebuzz/MicroSymfony/graphs/contributors">
  <img alt="strangebuzz/MicroSymfony contributors" src="https://contrib.rocks/image?repo=strangebuzz/MicroSymfony" />
</a>

Made with [contrib.rocks](https://contrib.rocks).


## License ⚖️

The MIT License (MIT). Please see the [license file](https://github.com/strangebuzz/MicroSymfony/blob/main/LICENSE) for more information.


## Built with MicroSymfony 🛠️

* [Appartement-tourcoing.com](https://www.appartement-tourcoing.com/) (2024-11-30)
* [Easyadmin Mercure Demo](https://github.com/coopTilleuls/easyadmin-mercure-demo) (2023-05-24)
