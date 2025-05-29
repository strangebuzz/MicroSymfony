<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Kernel;

return static function (ContainerConfigurator $containerConfigurator): void {
    if (Kernel::VERSION_ID < 70200) {
        return;
    }

    $containerConfigurator->extension('framework', [
        'property_info' => [
            'with_constructor_extractor' => true,
        ],
    ]);
};
