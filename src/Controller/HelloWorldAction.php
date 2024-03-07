<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
final class HelloWorldAction extends AbstractController
{
    #[Route(path: '/hello-world', name: 'app_hello_world_action')]
    public function __invoke(): Response
    {
        return $this->render('hello_world.html.twig');
    }
}
