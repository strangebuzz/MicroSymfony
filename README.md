# MicroSymfony 🎶

[![Latest Version](https://img.shields.io/packagist/v/strangebuzz/microsymfony.svg?style=flat-square)](https://packagist.org/packages/strangebuzz/microsymfony)
[![PHP Version Require](https://poser.pugx.org/strangebuzz/microsymfony/require/php?style=flat-square)](https://packagist.org/packages/strangebuzz/microsymfony)
[![level](https://img.shields.io/badge/level-max-success?style=flat-square&logo=data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAGb0lEQVR42u1Xe1BUZRS/y4Kg8oiR3FCCBUySESZBRCiaBnmEsOzeSzsg+KxYYO9dEEftNRqZjx40FRZkTpqmOz5S2LsXlEZBciatkQnHDGYaGdFy1EpGMHl/p/PdFlt2rk5O+J9n5nA/vtf5ned3lnlISpRhafBlLRLHCtJGVrB/ZBDsaw2lUqzReGAC46DstTYfnSCGUjaaDvgxACo6j3vUenNdImeRXqdnWV5az5rrnzeZznj8J+E5Ftsclhf3s4J4CS/oRx5Bvon8ZU65FGYQxAwcf85a7CeRz+C41THejueydCZ7AAK34nwv3kHP/oUKdOL4K7258fF7Cud427O48RQeGkIGJ77N8fZqlrcfRP4d/x90WQfHXLeBt9dTrSlwl3V65ynWLM1SEA2qbNQckbe4Xmww10Hmy3shid0CMcmlEJtSDsl5VZBdfAgMvI3uuR+moJqN6LaxmpsOBeLCDmTifCB92RcQmbAUJvtqALc5sQr8p86gYBCcFdBq9wOin7NQax6ewlB6rqLZHf23FP10y3lj6uJtEBg2HxiVCtzd3SEwMBCio6Nh9uzZ4O/vLwOZ4OUNM2NyIGPFrvuzBG//lRPs+VQ2k1ki+ePkd84bskz7YFpYgizEz88P8vPzYffu3dDS0gJNTU1QXV0NqampRK1WIwgfiE4qhOyig0rC+pCvK8QUoML7uJVHA5kcQUp3DSpqWjc3d/Dy8oKioiLo6uqCoaEhuHb1KvT09AAhBFpbW4lOpyMyyIBQSCmoUQLQzgniNvz+obB2HS2RwBgE6dOxCyJogmNkP2u1Wrhw4QJ03+iGrR9XEd3CTNBn6eCbo40wPDwMdXV1BF1DVG5qiEtboxSUP6J71+D3NwUAhLOIRQzm7lnnhYUv7QFv/yDZ/Lm5ubK2DVI9iZ8bR8JDtEB57lNzENQN6OjoIGlpabIVZsYaMTO+hrikRRA1JxmSX9hE7/sJtVyF38tKsUCVZxBhz9jI3wGT/QJlADzPAyXrnj0kInzGHQCRMyOg/ed2uHjxIuE4TgYQHq2DLJqumashY+lnsMC4GVC5do6XVuK9l+4SkN8y+GfYeVJn2g++U7QygPT0dBgYGIDvT58mnF5PQcjC83PzSF9fH7S1tZGEhAQZQOT8JaA317oIkM6jS8uVLSDzOQqg23Uh+MlkOf00Gg0cP34c+vv74URzM9n41gby/rvvkc7OThlATU3NCGYJUXt4QaLuTYwBcTSOBmj1RD7D4Tsix4ByOjZRF/zgupDEbgZ3j4ly/qekpND0o5aQ44HS4OAgsVqtI1gTZO01IbG0aP1bknnxCDUvArHi+B0lJSlzglTFYO2udF3Ql9TCrHn5oEIreHp6QlRUFJSUlJCqqipSWVlJ8vLyCGYIFS7HS3zGa87mv4lcjLwLlStlLTKYYUUAlvrlDGcW45wKxXX6aqHZNutM+1oQBHFTewAKkoH4+vqCj48PYAGS5yb5amjNoO+CU2SL53NKpDD0vxHHmOJir7L5xUvZgm0us2R142ScOIyVqYvlpWU4XoHIP8DXL2b+wjdWeXh6U2FjmIIKmbWAYPFRMus62h/geIvjOQYlpuDysQrLL6Ger49HgW8jqvXUhI7UvDb9iaSTDqHtyItiF5Suw5ewF/Nd8VJ6zlhsn06bEhwX4NyfCvuGEeRpTmh4mkG68yDpyuzB9EUcjU5awbAgncPlAeSdAQER0zCndzqVbeXC4qDsMpvGEYBXRnsDx4N3Auf1FCTjTIaVtY/QTmd0I8bBVm1kejEubUfO01vqImn3c49X7qpeqI9inIgtbpxK3YrKfIJCt+OeV2nfUVFR4ca4EkVENyA7gkYcMfB1R5MMmxZ7ez/2KF5SSN1yV+158UPsJT0ZBcI2bRLtIXGoYu5FerOUiJe1OfsL3XEWH43l2KS+iJF9+S4FpcNgsc+j8cT8H4o1bfPg/qkLt50uJ1RzdMsGg0UqwfEN114Pwb1CtWTGg+Y9U5ClK9x7xUWI7BI5VQVp0AVcQ3bZkQhmnEgdHhKyNSZe16crtBIlc7sIb6cRLft2PCgoKGjijBDtjrAQ7a3EdMsxzIRflAFIhPb6mHYmYwX+WBlPQgskhgVryyJCQyNyBLsBQdQ6fgsQhyt6MSOOsWZ7gbH8wETmgRKAijatNL8Ngm0xx4tLcsps0Wzx4al0jXlI40B/A3pa144MDtSgAAAAAElFTkSuQmCC)](https://github.com/strangebuzz/MicroSymfony/actions)
[![Software License](https://img.shields.io/badge/License-MIT-brightgreen.svg?style=flat-square)](https://github.com/strangebuzz/MicroSymfony/blob/main/LICENSE)
[![Build Status (GitHub)](https://img.shields.io/github/actions/workflow/status/strangebuzz/microsymfony/symfony.yml?branch=main&style=flat-square)](https://github.com/strangebuzz/microsymfony/actions?query=workflow%3ASymfony+branch%3Amain)
[![Code Coverage](https://scrutinizer-ci.com/g/strangebuzz/MicroSymfony/badges/coverage.png?b=main)](https://scrutinizer-ci.com/g/strangebuzz/MicroSymfony/code-structure/main/code-coverage/src/)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/strangebuzz/MicroSymfony/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/strangebuzz/MicroSymfony/?branch=main)
[![Quality Score](https://img.shields.io/scrutinizer/g/strangebuzz/microsymfony.svg?style=flat-square)](https://scrutinizer-ci.com/g/strangebuzz/microsymfony)

## About 🖋 

MicroSymfony is a [Symfony 7.2](https://symfony.com/blog/symfony-7-2-curated-new-features)
application skeleton on steroids, ready to use.

I have made a long blog post explaining the philosophy behind and how to use it:

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
* [Contributing](#contributing-)
* [Security](#contributing-)
* [Credits](#contributing-)
* [License](#contributing-)


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

* [PHP 8.2](https://www.php.net/releases/8.2/en.php) (also works with [PHP 8.3](https://www.php.net/releases/8.3/en.php) and [PHP 8.4](https://www.php.net/releases/8.4/en.php))
* The [Symfony CLI](https://symfony.com/download)


### Optional requirements ⚙
 
* The [Xdebug](https://xdebug.org/) PHP extension if you want to run the code coverage report
* [Castor](https://github.com/jolicode/castor) task runner if you don't want to use
  [Make](https://www.gnu.org/software/make/) and its [Makefile](https://github.com/strangebuzz/MicroSymfony/blob/main/Makefile) 


## Stack 🔗

* [Symfony 7.2](https://symfony.com/7)
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
  * [Tests job output](https://github.com/strangebuzz/MicroSymfony/actions/runs/12099802785/job/33737745422)
  * [Lint job output](https://github.com/strangebuzz/MicroSymfony/actions/runs/12099802785/job/33737745094)
  * [Security job output](https://github.com/strangebuzz/MicroSymfony/actions/runs/12099802785/job/33737745205)
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
Then clone the `eloquent` branch, and run `composer install && make load-fixtures`.

### Infrastructure

* FrankenPHP ([PR](https://github.com/strangebuzz/MicroSymfony/pull/54), [branch](https://github.com/strangebuzz/MicroSymfony/tree/frankenphp), rebased on 2024-11-17)
* Symfony-docker ([PR](https://github.com/strangebuzz/MicroSymfony/pull/98), [branch](https://github.com/strangebuzz/MicroSymfony/tree/symfony-docker), rebased on 2024-11-17)

### Database 💽

These « database » branches aim to display a list of records from a [SQLite](https://www.sqlite.org/)
database.
 
* Doctrine DBAL ([PR](https://github.com/strangebuzz/MicroSymfony/pull/72), [branch](https://github.com/strangebuzz/MicroSymfony/tree/doctrine-dbal), rebased on 2024-11-17)
* Eloquent ORM ([PR](https://github.com/strangebuzz/MicroSymfony/pull/65), [branch](https://github.com/strangebuzz/MicroSymfony/tree/eloquent), rebased on 2024-11-17)

### Tooling 🔨

* Taskfile ([PR](https://github.com/strangebuzz/MicroSymfony/pull/86), [branch](https://github.com/jmsche/MicroSymfony/tree/taskfile), rebased on 2024-11-17)
* TwigStan ([PR](https://github.com/strangebuzz/MicroSymfony/pull/95), [branch](https://github.com/strangebuzz/MicroSymfony/tree/twigstan), rebased on 2024-11-17)
* Twig-CS-Fixer ([PR](https://github.com/strangebuzz/MicroSymfony/pull/118), [branch](https://github.com/strangebuzz/MicroSymfony/tree/feat/use-twig-cs-fixer), rebased on 2024-11-21)

One will rebase those branches regularly so they are always up to date.


## Notes 📒

### Symfony-UX

Turbo forms are disabled in [assets/app.js](https://github.com/strangebuzz/MicroSymfony/blob/main/assets/app.js).
To enable the feature for a given form, add the `data-turbo="true"` attribute to it. 
Or change the parameter `Turbo.setFormMode` to `on` to activate the feature globally.
In both cases, your controller code has to be [modified accordingly](https://symfony.com/bundles/ux-turbo/current/index.html#3-form-response-code-changes).

### PHP configuration files

If you install a new Symfony library, the flex recipes can add YAML files to your
project.
These YAML files are loaded, but you can convert them to PHP like the other configuration
files.
For example, to convert the `messenger` YAML configuration to PHP with [Simplify](https://github.com/symplify/config-transformer),
run:

    vendor/bin/config-transformer convert config/packages/messenger.yaml


## Other good practices 👌

* Using PHP configuration files instead of YAML ([source](https://github.com/strangebuzz/MicroSymfony/blob/main/config/services.php))
* Using strict types in all PHP files ([source](https://github.com/strangebuzz/MicroSymfony/blob/main/src/Controller/SlugifyAction.php#L3))
* Using the ADR pattern in an action controller ([source](https://github.com/strangebuzz/MicroSymfony/blob/main/src/Controller/SlugifyAction.php)) ([doc](https://symfony.com/doc/current/controller/service.html#invokable-controllers))
* The [composer.json](https://github.com/strangebuzz/MicroSymfony/blob/main/composer.json) 
  file is normalized with [ergebnis/composer-normalize](https://github.com/ergebnis/composer-normalize)
* Use of the [composer bin plugin](https://github.com/bamarni/composer-bin-plugin)
  to install and run [php-cs-fixer](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer)


## References 📚

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

* [COil](https://github.com/COil)
* [All Contributors](https://github.com/strangebuzz/MicroSymfony/graphs/contributors)
 

## License ⚖️

The MIT License (MIT). Please see [License File](https://github.com/strangebuzz/MicroSymfony/blob/main/LICENSE) for more information.
