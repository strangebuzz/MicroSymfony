# MicroSymfony 🎶

## Introduction 🖋 

MicroSymfony is a Symfony 7.0 application skeleton on steroids, ready to use.

I have made a long blog post explaining all it contains; it will be the reference
for documentation. 
I'll update it when needed:

* [Introducing the MicroSymfony application template](https://www.strangebuzz.com/en/blog/introducing-the-microsymfony-application-template)

So this blog post is the official documentation.
This readme is a teaser of what MicroSymfony contains.

If you want to use the last Symfony 6.4 LTS version, in your `composer.json file`,
replace all occurences of `7.0` by `6.4`, run `composer up` and your are done.  


## Demo 🌈

Because a live demo is always better than all explanations. Here is it:

* Live demo at [https://microsymfony.ovh](https://microsymfony.ovh)


## Quick-start 🐰

Run

    composer create-project strangebuzz/microsymfony
    cd microsymfony

then

    make start

or

    castor symfony:start

Open [https://127.0.0.1:8000](https://127.0.0.1:8000) (considering your 8000 port is free).

Enjoy!


## Requirements ⚙

* [PHP 8.3](https://www.php.net/releases/8.3/en.php)  (also works with [PHP 8.2](https://github.com/strangebuzz/MicroSymfony/actions/runs/7331493507/job/19964206101))
* The [Symfony CLI](https://symfony.com/download)


## Optional requirements ⚙
 
* The [Xdebug](https://xdebug.org/) PHP extension if you want to run the code coverage report
* [Castor](https://github.com/jolicode/castor) task runner


## Stack 🔗

* [Symfony 7.0](https://symfony.com/7)
* [Twig 3.8](https://twig.symfony.com)
* [Stimulus 3.2](https://stimulus.hotwired.dev/)
* [PHPUnit 10.5](https://phpunit.de)
* The classless [BareCSS](http://barecss.com) CSS framework


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
  * [Output on CI](https://github.com/strangebuzz/MicroSymfony/actions/runs/7186942462/job/19573439511)
* GitHub CI ([actions](https://github.com/strangebuzz/MicroSymfony/actions))
  * [Tests job output](https://github.com/strangebuzz/MicroSymfony/actions/runs/7186942462/job/19573439511)
  * [Lint job output](https://github.com/strangebuzz/MicroSymfony/actions/runs/7186942462/job/19573439221)
* Asset mapper+Stimulus ([documentation](https://symfony.com/doc/current/frontend/asset_mapper.html))
  * Vanilla Js ([source](https://github.com/strangebuzz/MicroSymfony/blob/main/assets/controllers/hello_controller.js)) ([demo](https://microsymfony.ovh/stimulus))
  * Fetch on a JSON endpoint of the application ([source](https://github.com/strangebuzz/MicroSymfony/blob/main/assets/controllers/api_controller.js)) ([demo](https://microsymfony.ovh/stimulus)) 
* A custom error template
  * [Source](https://github.com/strangebuzz/MicroSymfony/blob/main/templates/bundles/TwigBundle/Exception/error.html.twig)
  * [Demo](https://microsymfony.ovh/404) 


## Other good practices 👌

* Using strict types in all PHP files ([source](https://github.com/strangebuzz/MicroSymfony/blob/main/src/Controller/AppController.php#L3))
* Using the ADR pattern in an action controller ([source](https://github.com/strangebuzz/MicroSymfony/blob/main/src/Controller/SlugifyAcfion.php)) ([doc](https://symfony.com/doc/current/controller/service.html#invokable-controllers))
* The [composer.json](https://github.com/strangebuzz/MicroSymfony/blob/main/composer.json) 
  file is normalized with [ergebnis/composer-normalize](https://github.com/ergebnis/composer-normalize)


## What it doesn't ship? ❌

* Doctrine ([installation](https://symfony.com/doc/current/doctrine.html#installing-doctrine))


## References 📚

* [Castor, a journey across the sea of task runners](https://jolicode.com/blog/castor-a-journey-across-the-sea-of-task-runners) (jolicode.com)
* [Initializing your Symfony project with solid foundations](https://www.strangebuzz.com/en/blog/initializing-your-symfony-project-with-solid-foundations) (strangebuzz.com)
* [Organizing your Symfony project tests](https://www.strangebuzz.com/en/blog/organizing-your-symfony-project-tests) (strangebuzz.com)
* [What are your Symfony best practices?](https://www.strangebuzz.com/en/blog/what-are-your-symfony-best-practices) (strangebuzz.com)
* [Setting a CI/CD workflow for a Symfony project thanks to the GitHub actions](https://www.strangebuzz.com/en/blog/setting-a-ci-cd-workflow-for-a-symfony-project-thanks-to-the-github-actions) (strangebuzz.com)
* [The Symfony Framework Best Practices](https://symfony.com/doc/current/best_practices.html) (symfony.com)
