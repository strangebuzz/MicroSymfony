<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Attribute\Cache;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\RouterInterface;

/**
 * @see StaticActionTest
 */
#[AsController]
#[Cache(maxage: 3600, public: true)]
final class HomeAction extends AbstractController
{
    /**
     * Simple page with some content.
     */
    #[Route(path: '/', name: self::class)]
    public function __invoke(RouterInterface $router, Filesystem $filesystem): Response
    {
        $readme = $filesystem->readFile(__DIR__.'/../../README.md');

        return $this->render(self::class.'.html.twig', ['readme' => $readme]);
    }
}
