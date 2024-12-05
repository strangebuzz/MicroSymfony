<?php

// This file is the entry point to configure your own services.
// Files in the packages/ subdirectory configure your dependencies.

// Put parameters here that don't need to change on each machine where the app is deployed
// https://symfony.com/doc/current/best_practices.html#use-parameters-for-application-configuration

declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    // Parameters
    $parameters = $containerConfigurator->parameters();

    // System parameters: https://symfony.com/doc/current/performance.html
    $parameters->set('.container.dumper.inline_factories', true);

    // Application parameters
    $parameters->set('brand', 'MicroSymfony');
    $parameters->set('brand_html', '<b>Micro</b>Symfony 🎶');
    $parameters->set('brand_emoji', '🎶️');
    $parameters->set('website', 'https://github.com/strangebuzz/MicroSymfony');
    $parameters->set('version', '1.0.0');

    $description = <<<'DESCRIPTION'
This page displays the <a att="" target="_blank" href="https://github.com/strangebuzz/MicroSymfony/blob/main/README.md">README.md</a>
file of the GitHub repository (This text comes from <code>config/services.php</code>).
DESCRIPTION;
    $parameters->set('description', $description);

    // Services
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
