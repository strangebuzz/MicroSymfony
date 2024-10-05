<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\User;
use Illuminate\Database\DatabaseManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Attribute\Cache;
use Symfony\Component\Routing\Attribute\Route;

/**
 * @see UserSeeder
 */
#[AsController]
#[Cache(maxage: 3600, public: true)]
final class EloquentAction extends AbstractController
{
    #[Route(path: '/eloquent', name: self::class)]
    public function __invoke(DatabaseManager $db): Response
    {
        return $this->render(self::class.'.html.twig', [
            'users' => $db->table(User::TABLE)->get(),
        ]);
    }
}
