<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->extension('framework', [
        'router' => [
            'utf8' => true,

            // Configure how to generate URLs in non-HTTP contexts, such as CLI commands.
            // See https://symfony.com/doc/current/routing.html#generating-urls-in-commands
            // 'default_uri' => 'http://localhost'
        ],
    ]);
    if ($containerConfigurator->env() === 'prod') {
        $containerConfigurator->extension('framework', [
            'router' => [
                'strict_requirements' => null,
            ],
        ]);
    }
};
