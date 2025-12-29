<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return App::config([
    'when@dev' => [
        'web_profiler' => [
            'toolbar' => true,
            'intercept_redirects' => false,
        ],
        'framework' => [
            'profiler' => [
                'only_exceptions' => false,
                'collect_serializer_data' => true,
            ],
        ],
    ],
    'when@test' => [
        'web_profiler' => [
            'toolbar' => false,
            'intercept_redirects' => false,
        ],
        'framework' => [
            'profiler' => [
                'collect' => false,
            ],
        ],
    ],
]);
