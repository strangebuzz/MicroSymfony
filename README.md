# MicroSymfony 🎶

MicroSymfony is a Symfony application skeleton on steroids, ready to use.

I have made a long blog post explaining all it contains, this will be the reference
for documentation, and I'll update it when needed:

* https://www.strangebuzz.com/en/blog/introducing-the-microsymfony-application-template (🇬🇧)


## Demo 🌈

Because a live demo is always better than all explanations. Here is it:

* Live demo at [https://microsymfony.ovh](https://microsymfony.ovh)


## Requirements ⚙

* [PHP 8.1](https://www.php.net/releases/8.1/en.php) (works with [PHP 8.2](https://github.com/strangebuzz/MicroSymfony/actions/runs/5793881686/job/15702426339))
* The [Symfony CLI](https://symfony.com/download)
* The [Xdebug](https://xdebug.org/) PHP extension if you want to run the code coverage report (optional)
* [Castor 0.7](https://github.com/jolicode/castor) task runner (optional)

## Stack 🔗

* [Symfony 6.3](https://symfony.com)
* [Twig 3](https://twig.symfony.com)
* [Stimulus 3.2](https://stimulus.hotwired.dev/)
* [PHPUnit 9.5](https://phpunit.de)
* The classless [BareCSS](http://barecss.com) CSS framework 


## Features 🚀

**MicroSymfony** ships these features, ready to use:

* A task runner
  * Make ([source](https://github.com/strangebuzz/MicroSymfony/blob/main/Makefile)) ([demo](https://www.strangebuzz.com/en/blog/introducing-the-microsymfony-application-template#h3_4_1))
  * Castor ([source](https://github.com/strangebuzz/MicroSymfony/blob/main/castor.php)) ([demo](https://www.strangebuzz.com/en/blog/introducing-the-microsymfony-application-template#h3_4_2))
* Static analysis with PHPStan
  * [Configuration](https://github.com/strangebuzz/MicroSymfony/blob/main/phpstan.neon)
* Coding standards with php-cs-fixer
  * [Configuration](https://github.com/strangebuzz/MicroSymfony/blob/main/.php-cs-fixer.dist.php)
* Tests ([demo](https://www.strangebuzz.com/en/blog/introducing-the-microsymfony-application-template#h2_7))
  * Unit test [example](https://github.com/strangebuzz/MicroSymfony/tree/main/tests/Unit/Helper) 
  * Integration test [example](https://github.com/strangebuzz/MicroSymfony/blob/main/tests/Integration/Twig/Extension/ResponseExtensionTest.php) 
  * Functional test [example](https://github.com/strangebuzz/MicroSymfony/blob/main/tests/Functional/Controller/AppControllerTest.php) 
  * API test [example](https://github.com/strangebuzz/MicroSymfony/blob/main/tests/Api/Controller/SlugifyActionTest.php) 
  * E2E test [example](https://github.com/strangebuzz/MicroSymfony/blob/main/tests/E2E/Controller/AppControllerTest.php)
* Code coverage at 100%
  * [Output on CI](https://github.com/strangebuzz/MicroSymfony/actions/runs/5793881686/job/15702426150)
  * [Failing output example](https://github.com/strangebuzz/MicroSymfony/actions/runs/5220428064/jobs/9423476258)
* GitHub CI
  * [Tests job output](https://github.com/strangebuzz/MicroSymfony/actions/runs/5793881686/job/15702426150)
  * [Lint job output](https://github.com/strangebuzz/MicroSymfony/actions/runs/5793881686/job/15702425939)
* Asset mapper+Stimulus
  * Vanilla Js ([source](https://github.com/strangebuzz/MicroSymfony/blob/main/assets/controllers/hello_controller.js)) ([demo](https://microsymfony.ovh/stimulus))
  * Fetch on a JSON endpoint of the application ([source](https://github.com/strangebuzz/MicroSymfony/blob/main/assets/controllers/api_controller.js)) ([demo](https://microsymfony.ovh/stimulus)) 
* A custom error template
  * [Source](https://github.com/strangebuzz/MicroSymfony/blob/main/templates/bundles/TwigBundle/Exception/error.html.twig)
  * [Demo](https://microsymfony.ovh/404) 


## What it doesn't ship? ❌

* The debug toolbar
* Doctrine


## References 📚

* https://jolicode.com/blog/castor-a-journey-across-the-sea-of-task-runners