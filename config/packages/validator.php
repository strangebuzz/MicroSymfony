<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return App::config([
    'framework' => [
        'validation' => [
            'email_validation_mode' => 'html5',

            // Since Symfony 8.1: throw when validateProperty()/validatePropertyValue() target a
            // property that has no validation metadata (catches typos in constraint mapping).
            'property_metadata_existence_check' => true,

            // Enables validator auto-mapping support.
            // For instance, basic validation constraints will be inferred from Doctrine's metadata.
            // 'auto_mapping' => [
            //     'App\Entity\\' => [],
            // ],
        ],
    ],
    'when@dev' => [
        'framework' => [
            'validation' => [
                'not_compromised_password' => false,
            ],
        ],
    ],
]);
