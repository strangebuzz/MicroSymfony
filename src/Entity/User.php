<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * For a complete example, check out the Symfony demo entity.
 *
 * @see https://github.com/symfony/demo/blob/main/src/Entity/User.php
 */
#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[ORM\HasLifecycleCallbacks]
final class User implements \Stringable, UserInterface, PasswordAuthenticatedUserInterface
{
    final public const string ROLE_USER = 'ROLE_USER';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER, unique: true, nullable: false)]
    public ?int $id = null;

    #[ORM\Column(type: Types::STRING, length: 255, unique: true)]
    private string $email;

    #[ORM\Column(type: Types::STRING, length: 255)]
    private string $password;

    #[ORM\Column(type: Types::STRING, length: 255, unique: true, nullable: false)]
    private string $username;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE, nullable: false)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE, nullable: false)]
    private ?\DateTimeInterface $updatedAt = null;

    public function __construct(string $email, string $password, string $username)
    {
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    #[\Override]
    public function __toString(): string
    {
        return \sprintf('%s (%s)', $this->getUserIdentifier(), (string) ($this->getId() ?? 'not persisted'));
    }

    /**
     * @return array{int|null, string, string, string}
     */
    public function __serialize(): array
    {
        return [$this->id, $this->username, $this->password, $this->email];
    }

    /**
     * @param array{int|null, string, string, string} $data
     */
    public function __unserialize(array $data): void
    {
        [$this->id, $this->username, $this->password, $this->email] = $data;
    }

    #[\Override]
    public function getUserIdentifier(): string
    {
        if ($this->username === '') {
            throw new \LogicException('User username cannot be empty.');
        }

        return $this->username;
    }

    /**
     * Returns the roles or permissions granted to the user for security.
     */
    #[\Override]
    public function getRoles(): array
    {
        return [self::ROLE_USER];
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Be careful with your users' emails, they should be normalized.
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    #[\Override]
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * Auto set updatedAt and createdAt on persist.
     */
    #[ORM\PrePersist]
    public function onPrePersist(): void
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
    }

    /**
     * Auto set updatedAt on update.
     */
    #[ORM\PreUpdate]
    public function onPreUpdate(): void
    {
        $this->updatedAt = new \DateTimeImmutable();
    }
}
