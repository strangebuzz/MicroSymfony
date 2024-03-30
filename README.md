# MicroSymfony 🎶

## Introduction 🖋 

MicroSymfony is a Symfony 7.0 application skeleton on steroids, ready to use.

I have made a long blog post explaining all it contains; it will be the reference
for documentation. 
I'll update it when needed:

* [Introducing the MicroSymfony application template](https://www.strangebuzz.com/en/blog/introducing-the-microsymfony-application-template)

So, this blog post is the official documentation.
This readme is a teaser of what MicroSymfony contains.

If you want to use the last Symfony **6.4 LTS** version in your `composer.json`
file, replace all occurrences of `7.0` with `6.4`, run `composer up`, and you are
done.


## Demo 🌈

Because a live demo is always better than all explanations. Here is it:

* Live demo at [https://microsymfony.ovh](https://microsymfony.ovh)
* Live demo powered by [FrankenPHP](#frankenphp-) at [https://frankenphp.microsymfony.ovh](https://frankenphp.microsymfony.ovh)


## Quick-start with the Symfony binary 🎶 

You must have the [Symfony binary](https://symfony.com/download#step-1-install-symfony-cli)
and [composer](https://getcomposer.org/) installed locally.

To create a new project from the GitHub template, run:

    composer create-project strangebuzz/microsymfony
    cd microsymfony

Then start the PHP server with make:

    make start

Or with Castor:

    castor symfony:start

Open [https://127.0.0.1:8000](https://127.0.0.1:8000) (considering your 8000 port is free) and enjoy! 🙂


### FrankenPHP 🧟‍

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


## Requirements ⚙

* [PHP 8.2](https://www.php.net/releases/8.2/en.php) (also works with [PHP 8.3](https://www.php.net/releases/8.3/en.php))
* The [Symfony CLI](https://symfony.com/download)


## Optional requirements ⚙
 
* The [Xdebug](https://xdebug.org/) PHP extension if you want to run the code coverage report
* [Castor](https://github.com/jolicode/castor) task runner if you don't want to use
  [Make](https://www.gnu.org/software/make/) and its [Makefile](https://github.com/strangebuzz/MicroSymfony/blob/main/Makefile) 


## Stack 🔗

* [Symfony 7.0](https://symfony.com/7)
* [Twig 3.8](https://twig.symfony.com)
* Hotwired [stimulus 3.2](https://stimulus.hotwired.dev/) and [turbo 7.3](https://turbo.hotwired.dev/)
* [PHPUnit 11.0](https://phpunit.de)
* The classless [BareCSS](http://barecss.com) CSS framework

**PS**: A [fork of BareCSS](https://github.com/strangebuzz/BareCSS/) was created
to fix some issues as the project is not maintained anymore.


## Features 🚀

**MicroSymfony** ships these features, ready to use:

* Two task runner
  * Make ([source](https://github.com/strangebuzz/MicroSymfony/blob/main/Makefile)) ([demo](https://www.strangebuzz.com/en/blog/introducing-the-microsymfony-application-template#h3_4_1))
  * Castor ([source](https://github.com/strangebuzz/MicroSymfony/blob/main/castor.php)) ([demo](https://www.strangebuzz.com/en/blog/introducing-the-microsymfony-application-template#h3_4_2))
* Static analysis with PHPStan
  * [Configuration](https://github.com/strangebuzz/MicroSymfony/blob/main/phpstan.neon)
* Coding standards with php-cs-fixer
  * [Configuration](https://github.com/strangebuzz/MicroSymfony/blob/main/.php-cs-fixer.dist.php)
* Tests ([demo](https://www.strangebuzz.com/en/blog/introducing-the-microsymfony-application-template#h2_7))
  * Unit test [example](https://github.com/strangebuzz/MicroSymfony/blob/main/tests/Unit/Helper/StringHelperTest.php) 
  * Integration test [example](https://github.com/strangebuzz/MicroSymfony/blob/main/tests/Integration/Twig/Extension/ResponseExtensionTest.php) 
  * Functional test [example](https://github.com/strangebuzz/MicroSymfony/blob/main/tests/Functional/Controller/AppControllerTest.php) 
  * API test [example](https://github.com/strangebuzz/MicroSymfony/blob/main/tests/Api/Controller/SlugifyActionTest.php) 
  * E2E test [example](https://github.com/strangebuzz/MicroSymfony/blob/main/tests/E2E/Controller/AppControllerTest.php)
* Code coverage at 100%
  * [Output on CI](https://github.com/strangebuzz/MicroSymfony/actions/runs/8070913583/job/22049355015)
* GitHub CI ([actions](https://github.com/strangebuzz/MicroSymfony/actions))
  * [Tests job output](https://github.com/strangebuzz/MicroSymfony/actions/runs/8070913583/job/22049355015)
  * [Lint job output](https://github.com/strangebuzz/MicroSymfony/actions/runs/8070913583/job/22049354786)
* Asset mapper+Stimulus ([documentation](https://symfony.com/doc/current/frontend/asset_mapper.html))
  * Vanilla Js ([source](https://github.com/strangebuzz/MicroSymfony/blob/main/assets/controllers/hello_controller.js)) ([demo](https://microsymfony.ovh/stimulus))
  * Fetch on a JSON endpoint of the application ([source](https://github.com/strangebuzz/MicroSymfony/blob/main/assets/controllers/api_controller.js)) ([demo](https://microsymfony.ovh/stimulus)) 
* A custom error template
  * [Source](https://github.com/strangebuzz/MicroSymfony/blob/main/templates/bundles/TwigBundle/Exception/error.html.twig)
  * [Demo](https://microsymfony.ovh/404) 


## Notes 📒

Turbo forms are disabled in [assets/app.js](assets/app.js).
To enable the feature for a given form, add the `data-turbo="true"` attribute to it. 
Or change the parameter `Turbo.setFormMode` to `on` to activate the feature globally.
In both cases, your controller code has to be [modified accordingly](https://symfony.com/bundles/ux-turbo/current/index.html#3-form-response-code-changes).


## Other good practices 👌

* Using strict types in all PHP files ([source](https://github.com/strangebuzz/MicroSymfony/blob/main/src/Controller/AppController.php#L3))
* Using the ADR pattern in an action controller ([source](https://github.com/strangebuzz/MicroSymfony/blob/main/src/Controller/SlugifyAcfion.php)) ([doc](https://symfony.com/doc/current/controller/service.html#invokable-controllers))
* The [composer.json](https://github.com/strangebuzz/MicroSymfony/blob/main/composer.json) 
  file is normalized with [ergebnis/composer-normalize](https://github.com/ergebnis/composer-normalize)
* Use of the [composer bin plugin](https://github.com/bamarni/composer-bin-plugin)
  to install and run [php-cs-fixer](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer)


## What it doesn't ship? ❌

* Doctrine ([installation](https://symfony.com/doc/current/doctrine.html#installing-doctrine))


## References 📚

* [Installing and using php-cs-fixer](https://www.strangebuzz.com/en/blog/installing-and-using-php-cs-fixer) (strangebuzz.com)
* [Castor, a journey across the sea of task runners](https://jolicode.com/blog/castor-a-journey-across-the-sea-of-task-runners) (jolicode.com)
* [Initializing your Symfony project with solid foundations](https://www.strangebuzz.com/en/blog/initializing-your-symfony-project-with-solid-foundations) (strangebuzz.com)
* [Organizing your Symfony project tests](https://www.strangebuzz.com/en/blog/organizing-your-symfony-project-tests) (strangebuzz.com)
* [What are your Symfony best practices?](https://www.strangebuzz.com/en/blog/what-are-your-symfony-best-practices) (strangebuzz.com)
* [Setting a CI/CD workflow for a Symfony project thanks to the GitHub actions](https://www.strangebuzz.com/en/blog/setting-a-ci-cd-workflow-for-a-symfony-project-thanks-to-the-github-actions) (strangebuzz.com)
* [The Symfony Framework Best Practices](https://symfony.com/doc/current/best_practices.html) (symfony.com)
