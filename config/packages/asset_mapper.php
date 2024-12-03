<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->extension('framework', [
        'asset_mapper' => [
            // The paths to make available to the asset mapper.
            'paths' => [
                'assets/',
            ],
        ],
    ]);
};
