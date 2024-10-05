<?php

declare(strict_types=1);

namespace App\Controller;

use Doctrine\DBAL\Connection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Attribute\Cache;
use Symfony\Component\Routing\Attribute\Route;

/**
 * @see Version20241005210212
 * @see LoadFixturesCommand
 */
#[AsController]
#[Cache(maxage: 3600, public: true)]
final class ListUsersAction extends AbstractController
{
    #[Route(path: '/users', name: self::class)]
    public function __invoke(Connection $conn): Response
    {
        return $this->render(self::class.'.html.twig', [
            'users' => $conn->fetchAllAssociative('SELECT * FROM user'),
        ]);
    }
}
