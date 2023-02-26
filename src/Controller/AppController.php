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
     * Simple page with some dyamic content.
     */
    #[Route(path: '/', name: 'home')]
    public function home(Request $request): Response
    {
        $name = $request->query->getAlpha('name');

        return $this->render('home.html.twig', compact('name'));
    }

    #[Route(path: '/readme', name: 'readme')]
    public function readme(Request $request): Response
    {
        $readme = file_get_contents(__DIR__.'/../../README.md');

        return $this->render('readme.html.twig', compact('readme'));
    }
}
