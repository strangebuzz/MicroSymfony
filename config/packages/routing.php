<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return App::config([
    'framework' => [
        'router' => [
            'utf8' => true,
            // Configure how to generate URLs in non-HTTP contexts, such as CLI commands.
            // See https://symfony.com/doc/current/routing.html#generating-urls-in-commands
            // 'default_uri' => 'http://localhost'
        ],
    ],
    'when@dev' => [
        'framework' => [
            'router' => [
                'strict_requirements' => null,
            ],
        ],
    ],
]);
