# MicroSymfony 🎶

## Introduction 🖋

MicroSymfony is a Symfony application skeleton on steroids, ready to use.

I have made a long blog post explaining all it contains; it will be the reference
for documentation. 
I'll update it when needed:

* [Introducing the MicroSymfony application template](https://www.strangebuzz.com/en/blog/introducing-the-microsymfony-application-template)

So this blog post is the official documentation.
This readme is a teaser of what MicroSymfony contains.


## Demo 🌈

Because a live demo is always better than all explanations. Here is it:

* Live demo at [https://microsymfony.ovh](https://microsymfony.ovh)


## Requirements ⚙

* [PHP 8.1](https://www.php.net/releases/8.1/en.php) (works with [PHP 8.2](https://github.com/strangebuzz/MicroSymfony/actions/runs/6363262161/job/17278782266))
* The [Symfony CLI](https://symfony.com/download)


## Optional requirements ⚙
 
* The [Xdebug](https://xdebug.org/) PHP extension if you want to run the code coverage report
* [Castor 0.8](https://github.com/jolicode/castor) task runner


## Stack 🔗

* [Symfony 6.3](https://symfony.com)
* [Twig 3](https://twig.symfony.com)
* [Stimulus 3.2](https://stimulus.hotwired.dev/)
* [PHPUnit 9.5](https://phpunit.de)
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
  * [Output on CI](https://github.com/strangebuzz/MicroSymfony/actions/runs/5793881686/job/15702426150)
  * [Failing output example](https://github.com/strangebuzz/MicroSymfony/actions/runs/5220428064/jobs/9423476258)
* GitHub CI ([actions](https://github.com/strangebuzz/MicroSymfony/actions))
  * [Tests job output](https://github.com/strangebuzz/MicroSymfony/actions/runs/5793881686/job/15702426150)
  * [Lint job output](https://github.com/strangebuzz/MicroSymfony/actions/runs/5793881686/job/15702425939)
* Asset mapper+Stimulus ([documentation](https://symfony.com/doc/current/frontend/asset_mapper.html))
  * Vanilla Js ([source](https://github.com/strangebuzz/MicroSymfony/blob/main/assets/controllers/hello_controller.js)) ([demo](https://microsymfony.ovh/stimulus))
  * Fetch on a JSON endpoint of the application ([source](https://github.com/strangebuzz/MicroSymfony/blob/main/assets/controllers/api_controller.js)) ([demo](https://microsymfony.ovh/stimulus)) 
* A custom error template
  * [Source](https://github.com/strangebuzz/MicroSymfony/blob/main/templates/bundles/TwigBundle/Exception/error.html.twig)
  * [Demo](https://microsymfony.ovh/404) 


## Other good practices 👌

* Using strict types in all PHP files ([source](https://github.com/strangebuzz/MicroSymfony/blob/main/src/Controller/AppController.php))
* Using the ADR pattern in an action controller ([source](https://github.com/strangebuzz/MicroSymfony/blob/main/src/Controller/SlugifyAcfion.php)) ([doc](https://symfony.com/doc/current/controller/service.html#invokable-controllers))


## What it doesn't ship? ❌

* The debug toolbar ([installation](https://symfony.com/doc/current/profiler.html))
* Doctrine ([installation](https://symfony.com/doc/current/doctrine.html#installing-doctrine))


## References 📚

* [Castor, a journey across the sea of task runners](https://jolicode.com/blog/castor-a-journey-across-the-sea-of-task-runners)
