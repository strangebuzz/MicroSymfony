<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return App::config([
    'when@dev' => [
        'framework' => [
            'property_info' => [
                'with_constructor_extractor' => true,
            ],
        ],
    ],
]);
