<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

const ZENSTRUCK_FOUNDRY = [
    // See full configuration: https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#full-default-bundle-configuration
    'zenstruck_foundry' => [
        'enable_auto_refresh_with_lazy_objects' => true,
        'persistence' => [
            // Flush only once per call of `PersistentObjectFactory::create()`
            'flush_once' => true,
        ],

        // If you use the `make:factory --test` command, you may need to uncomment the following.
        //  See https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#generate
        // services:
        //     App\Tests\Factory\:
        //         resource: '%kernel.project_dir%/tests/Factory/'
        //         autowire: true
        //         autoconfigure: true
    ],
];

return App::config([
    'when@dev' => ZENSTRUCK_FOUNDRY,
    'when@test' => ZENSTRUCK_FOUNDRY,
]);
