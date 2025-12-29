<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

/**
 * @see https://symfony.com/blog/new-in-symfony-7-4-better-php-configuration
 */
return App::config([
    'framework' => [
        'asset_mapper' => [
            // The paths to make available to the asset mapper.
            'paths' => [
                'assets/' => '',
            ],
            'missing_import_mode' => 'strict',
        ],
    ],
    'when@prod' => [
        'framework' => [
            'asset_mapper' => [
                'missing_import_mode' => 'warn',
            ],
        ],
    ],
]);
