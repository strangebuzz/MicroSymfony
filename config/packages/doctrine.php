<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return App::config([
    'doctrine' => [
        'dbal' => [
            'url' => '%env(resolve:DATABASE_URL)%',
            'profiling_collect_backtrace' => '%kernel.debug%',
        ],
        'orm' => [
            'validate_xml_mapping' => true,
            'naming_strategy' => 'doctrine.orm.naming_strategy.underscore_number_aware',
            'auto_mapping' => true,
            'mappings' => [
                'App' => [
                    'type' => 'attribute',
                    'is_bundle' => false,
                    'dir' => '%kernel.project_dir%/src/Entity',
                    'prefix' => 'App\Entity',
                    'alias' => 'App',
                ],
            ],
        ],
    ],
    'when@test' => [
        'doctrine' => [
            'dbal' => [
                // The test database MUST be isolated from the dev one: the Foundry
                // "ResetDatabase" trait drops the schema, so a shared database means
                // running the test suite wipes the data you are working with.
                //
                // This suffix has NO effect on SQLite (the default driver here), which is
                // why the test DSN is overridden in .env.test. It takes over as soon as you
                // switch to MySQL/PostgreSQL, and "TEST_TOKEN" (set by ParaTest) then gives
                // each parallel process its own database.
                'dbname_suffix' => '_test%env(default::TEST_TOKEN)%',
            ],
        ],
    ],
]);
