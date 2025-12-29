<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\App;

return App::config([
    'framework' => [
        'form' => [
            'csrf_protection' => [
                'token_id' => 'submit',
            ],
        ],
        'csrf_protection' => [
            'stateless_token_ids' => [
                'submit',
                'authenticate',
                'logout',
            ],
        ],
    ],
]);
