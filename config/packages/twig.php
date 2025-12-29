<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return App::config([
    'twig' => [
        'default_path' => '%kernel.project_dir%/templates',
        'globals' => [
            'brand' => '%brand%',
            'brand_html' => '%brand_html%',
            'brand_emoji' => '%brand_emoji%',
            'description' => '%description%',
            'website' => '%website%',
            'version' => '%version%',
        ],
    ],
    'when@test' => [
        'twig' => [
            'strict_variables' => true,
        ],
    ],
]);
