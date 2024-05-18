<?php

declare(strict_types=1);

namespace App\Controller;

use App\Helper\StringHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

/**
 * This is an action implementing the ADR pattern.
 *
 * @see SlugifyActionTest
 * @see https://symfony.com/doc/current/controller/service.html#invokable-controllers
 */
#[AsController]
#[Route(name: 'app_')]
final class SlugifyAction extends AbstractController
{
    /**
     * Simple API endpoint returning JSON. For a more serious API, please use API Platform 🕸.
     *
     * @see https://api-platform.com/
     */
    #[Route(path: '/api/slugify', name: 'slugify_action')]
    public function __invoke(Request $request, StringHelper $stringHelper): Response
    {
        return $this->json([
            'slug' => $stringHelper->slugify($request->query->getString('title')),
        ]);
    }
}
