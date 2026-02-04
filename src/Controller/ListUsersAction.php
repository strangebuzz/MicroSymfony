<?php

declare(strict_types=1);

namespace App\Controller;

use App\Data\Controller\ListUsersActionData;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
final class ListUsersAction extends AbstractController
{
    #[Route(path: '/users', name: self::class)]
    public function __invoke(ListUsersActionData $listUsersActionData): Response
    {
        return $this->render(self::class.'.html.twig', [
            'data' => $listUsersActionData->getData(),
        ]);
    }
}
