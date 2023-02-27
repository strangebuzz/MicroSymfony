# Symfony micro

Symfony-micro is a template to initialize an application to use Symfony as a microframework.

It can be used to create a POC or prototype without having to take care of the
design, while having something still enjoyable.

It's not really intented to be used in production.
Well at least you should remove the classless framework to use a real CSS framework.


## Requirements

* PHP 8.1
* The [Symfony CLI](https://symfony.com/download)


## Stack

* Symfony 6.2
* Twig 3
* The [Classless.de](https://classless.de) classless CSS framework
  or the [BarreCSS](http://barecss.com/) one. 


## What does it ship?
 
* A [default error page extending the base layout](https://github.com/strangebuzz/symfony-micro/blob/main/templates/bundles/TwigBundle/Exception/error.html.twig)



## What it doesn't ship?

* The debug toolbar
* Doctrine ORM


## Installation & first run

    composer install
    make start

Then open [https://127.0.0.1:8000](https://127.0.0.1:8000])

The port can change if 8000 is already used.


## Dev-tools 
 
* php-cs-fixer with the [Symfony ruleset and strict types](https://github.com/strangebuzz/symfony-micro/blob/main/php-cs-fixer.dist.php)
* PHPStan at [maximum level](https://github.com/strangebuzz/symfony-micro/blob/main/phpstan.neon)
* A simple [Makefile](https://github.com/strangebuzz/symfony-micro/blob/main/Makefile)
