<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->extension('doctrine', [
        'dbal' => [
            'url' => '%env(resolve:DATABASE_URL)%',
            'profiling_collect_backtrace' => '%kernel.debug%',
        ],
        // Uncomment to use the ORM
        //        'orm' => [
        //            'validate_xml_mapping' => true,
        //            'naming_strategy' => 'doctrine.orm.naming_strategy.underscore_number_aware',
        //            'auto_mapping' => true,
        //            'mappings' => [
        //                'App' => [
        //                    'type' => 'attribute',
        //                    'is_bundle' => false,
        //                    'dir' => '%kernel.project_dir%/src/Entity',
        //                    'prefix' => 'App\Entity',
        //                    'alias' => 'App',
        //                ],
        //            ],
        //        ],
    ]);
};
