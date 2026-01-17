<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\UserRepository;
use Doctrine\DBAL\Connection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
final class ListUsersAction extends AbstractController
{
    #[Route(path: '/users', name: self::class)]
    public function __invoke(Connection $conn, UserRepository $userRepository): Response
    {
        return $this->render(self::class.'.html.twig', [
            'users_dbal' => $conn->fetchAllAssociative('SELECT * FROM user'),
            'users_orm' => $userRepository->findAll(),
        ]);
    }
}
