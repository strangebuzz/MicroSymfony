<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Attribute\Cache;
use Symfony\Component\Routing\Attribute\Route;

/**
 * @see ComposerActionTest
 */
#[AsController]
#[Cache(maxage: 3600, public: true)]
final class ComposerAction extends AbstractController
{
    /**
     * Displays the composer.json file.
     */
    #[Route(path: '/composer', name: self::class)]
    public function __invoke(Filesystem $filesystem): Response
    {
        $composer = $filesystem->readFile(__DIR__.'/../../composer.json');

        return $this->render(self::class.'.html.twig', ['composer' => $composer]);
    }
}
