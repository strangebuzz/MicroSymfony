<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

use function Symfony\Component\String\u;

/**
 * This is an action implemting the ADR pattern.
 *
 * @see https://symfony.com/doc/current/controller/service.html#invokable-controllers
 */
#[AsController]
final class SlugifyAcfion extends AbstractController
{
    /**
     * Simple API endpoint returning JSON.
     */
    #[Route(path: '/api/slugify', name: 'app_slugifyacfion')]
    public function __invoke(Request $request, SluggerInterface $slugger): Response
    {
        $title = u($request->query->get('title'))->lower()->toString();

        return $this->json(['slug' => $slugger->slug($title)]);
    }
}
