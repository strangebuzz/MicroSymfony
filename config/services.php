<?php

// This file is the entry point to configure your own services.
// Files in the packages/ subdirectory configure your dependencies.

// Put parameters here that don't need to change on each machine where the app is deployed
// @see https://symfony.com/doc/current/best_practices.html#use-parameters-for-application-configuration

// The PHP configuration files have been generated with symplify/config-transformer.
// @see https://github.com/symplify/config-transformer

// In each PHP config file the "ContainerConfigurator" service is injected.
// If you want to use the fluent interface you can add the specific extension configurator
// Check out the full example in "config/packages/framework.php".
// This feature is only available for "root" services corresponding to the
// "var/cache/dev/Symfony/Config/*Config.php" configurators.

declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Kernel;

return static function (ContainerConfigurator $containerConfigurator): void {
    $parameters = $containerConfigurator->parameters();

    // System parameters: https://symfony.com/doc/current/performance.html#dump-the-service-container-into-a-single-file
    $parameters->set('.container.dumper.inline_factories', true);

    // Application parameters ——————————————————————————————————————————————————
    $parameters->set('brand', 'MicroSymfony');
    $parameters->set('brand_html', '<b>Micro</b>Symfony 🎶');
    $parameters->set('brand_emoji', '🎶️');
    $parameters->set('website', 'https://github.com/strangebuzz/MicroSymfony');
    $parameters->set('version', '1.0.0');
    $sfVersion = substr(Kernel::VERSION, 0, 3); // minor Symfony version
    $description = <<<DESCRIPTION
A Symfony <b>$sfVersion</b> application template on steroids, ready to use.
DESCRIPTION;
    $parameters->set('description', $description);

    // Services ————————————————————————————————————————————————————————————————
    $services = $containerConfigurator->services();
    $services->defaults()
        ->autowire()      // Automatically injects dependencies in your services.
        ->autoconfigure() // Automatically registers your services as commands, event subscribers, etc.

        // bind examples
        ->bind('string $environment', '%kernel.environment%')
        ->bind('bool $debug', '%kernel.debug%')
    ;

    $services->load('App\\', __DIR__.'/../src')
        ->exclude([
            __DIR__.'/../src/DependencyInjection/',
            __DIR__.'/../src/Entity/',
            __DIR__.'/../src/Kernel.php',
        ]);
};
