<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Attribute\Cache;
use Symfony\Component\Routing\Attribute\Route;

/**
 * @see StaticActionTest
 */
#[AsController]
#[Route(name: 'app_')]
#[Cache(maxage: 3600, public: true)]
final class HomeAction extends AbstractController
{
    /**
     * Simple page with some content.
     */
    #[Route(path: '/', name: 'home')]
    public function __invoke(): Response
    {
        $readme = file_get_contents(__DIR__.'/../../README.md');

        return $this->render('home.html.twig', ['readme' => $readme]);
    }
}
