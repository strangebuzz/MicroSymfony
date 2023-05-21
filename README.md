# MicroSymfony 🎶

MicroSymfony is a template to initialize an application to use Symfony as a microframework.

It can be used to create a POC or prototyping something without having to take care
of the design, while having something still enjoyable (and fit to be seen).

Even it is minimalist, we don't want to sacrifice quality.
There are some tests (100% coverage) and CS checks: php-cs-fixer + PHPStan. 

It's not really intented to be used in production, use a your onw risks.
Well at least you should remove the classless framework to use a modern CSS framework.


## Demo 🌈

Because a live demo is always better than all explanations. Here is it:

* Live demo at [https://microsymfony.ovh](https://microsymfony.ovh)
* Another barreccs demo can be found [here](https://dohliam.github.io/dropin-minimal-css/?bare#text)


## Todo 

* Install the code coverage report plugin for PHPUnit
* Use import maps (doc not done yet):
  * https://github.com/symfony/asset-mapper 


## To try/test

* try dropin minimal: https://github.com/dohliam/dropin-minimal-css


## Requirements ⚙

* [PHP 8.1](https://www.php.net/releases/8.1/en.php)
* The [Symfony CLI](https://symfony.com/download)
* The [Xdebug](https://xdebug.org/) PHP extension if you want to run the code coverage report


## Stack 🔗

* [Symfony 6.3](https://symfony.com)
* [Twig 3](https://twig.symfony.com)
* [PHPUnit 9.5](https://phpunit.de)
* The classless [BareCSS](http://barecss.com) CSS framework 

## Barecss forks

* https://github.com/zonradkuse


## What does it ship? 🚀

* A [demo with some JavaScript and Stimulus](https://github.com/strangebuzz/MicroSymfony/blob/main/templates/stimulus.html.twig) 
* A [default error page extending the base layout](https://github.com/strangebuzz/symfony-micro/blob/main/templates/bundles/TwigBundle/Exception/error.html.twig)


## What it doesn't ship? ❌

* The debug toolbar
* Doctrine ORM


## Installation & first run 🚀

    composer install
    make start

Then open [https://127.0.0.1:8000](https://127.0.0.1:8000)

The port can change if 8000 is already used.


## Tests ✅

Run tests with:

    vendor/bin/simple-phpunit

or

    composer app-test

or

    make test


## Dev-tools ✨
 
* php-cs-fixer with the [Symfony ruleset and PHP strict types](https://github.com/strangebuzz/MicroSymfony/blob/main/.php-cs-fixer.dist.php)
* PHPStan at [maximum level](https://github.com/strangebuzz/MicroSymfony/blob/main/phpstan.neon)
* A simple [Makefile](https://github.com/strangebuzz/MicroSymfony/blob/main/Makefile)
