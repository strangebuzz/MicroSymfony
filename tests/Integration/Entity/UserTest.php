<?php

declare(strict_types=1);

namespace App\Tests\Integration\Entity;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Zenstruck\Foundry\Test\ResetDatabase;

final class UserTest extends KernelTestCase
{
    use ResetDatabase;

    public function testPersistNewUserSuccess(): void
    {
        /** @var EntityManagerInterface $em */
        $em = self::getContainer()->get(EntityManagerInterface::class);
        $user = new User(
            email: 'test@example.com',
            password: 'hashed_password',
            username: 'testuser'
        );

        // persist (@see User::PrePersist())
        $em->persist($user);
        $em->flush();
        self::assertSame(1, $user->getId());

        // update (@see User::onPreUpdate())
        $user->setEmail('new_email');
        $em->flush();
        self::assertSame('new_email', $user->getEmail());
    }
}
