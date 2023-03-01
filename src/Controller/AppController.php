<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
#[Route(name: 'app_')]
final class AppController extends AbstractController
{
    /**
     * Simple page with some dynamic content.
     */
    #[Route(path: '/', name: 'home')]
    public function home(Request $request): Response
    {
        $name = $request->query->getAlpha('name');

        return $this->render('home.html.twig', compact('name'));
    }

    /**
     * Displays the repository readme doc file.
     */
    #[Route(path: '/readme', name: 'readme')]
    public function readme(): Response
    {
        $readme = file_get_contents(__DIR__.'/../../README.md');

        return $this->render('readme.html.twig', compact('readme'));
    }

    /**
     * Displays the composer.json file.
     */
    #[Route(path: '/composer', name: 'composer')]
    public function composer(): Response
    {
        $composer = file_get_contents(__DIR__.'/../../composer.json');

        return $this->render('composer.html.twig', compact('composer'));
    }
}
