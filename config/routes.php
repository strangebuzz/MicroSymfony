<?php

declare(strict_types=1);

use Symfony\Bundle\FrameworkBundle\Controller\TemplateController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return static function (RoutingConfigurator $routingConfigurator): void {
    $routingConfigurator->import([
        'path' => '../src/Controller/',
        'namespace' => 'App\Controller',
    ], 'attribute');

    // https://symfony.com/doc/current/templates.html#rendering-a-template-directly-from-a-route
    $routingConfigurator->add('App\Controller\StimulusAction', '/stimulus')
        ->controller(TemplateController::class)
        ->defaults([
            'template' => 'App/Controller/StimulusAction.html.twig',
        ]);
};
