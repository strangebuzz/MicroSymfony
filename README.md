# MicroSymfony 🎶

MicroSymfony is a template to initialize an application to use Symfony as a microframework.

It can be used to create a POC or prototyping something without having to take care
of the design, while having something still enjoyable (and fit to be seen).

It's not really intented to be used in production.
Well at least you should remove the classless framework to use a real CSS framework.

## Todo

* Tester avec le creape app de composer


## Demo 🌈

Because a live demo is always better than all explanations. Here is it:

* Live demo at [https://microsymfony.ovh](https://microsymfony.ovh)


## Requirements ⚙

* [PHP 8.1](https://www.php.net/releases/8.1/en.php)
* The [Symfony CLI](https://symfony.com/download)
* The [Xdebug](https://xdebug.org/) PHP extension if you want to run the code coverage report


## Stack 🔗

* [Symfony 6.2](https://symfony.com)
* [Twig 3](https://twig.symfony.com)
* [PHPUnit 9.5](https://phpunit.de)
* The classless [BarreCSS](http://barecss.com) CSS framework 


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
