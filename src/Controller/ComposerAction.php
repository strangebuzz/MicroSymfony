<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Attribute\Cache;
use Symfony\Component\Routing\Attribute\Route;

/**
 * @see ComposerActionTest
 */
#[AsController]
#[Route(name: 'app_')]
#[Cache(maxage: 3600, public: true)]
final class ComposerAction extends AbstractController
{
    /**
     * Displays the composer.json file.
     */
    #[Route(path: '/composer', name: 'composer')]
    public function __invoke(): Response
    {
        $composer = file_get_contents(__DIR__.'/../../composer.json');

        return $this->render('composer.html.twig', ['composer' => $composer]);
    }
}
