<?php

declare(strict_types=1);

namespace App\Dto;

use App\Enum\Fruit;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @see FormAction
 * @see RegisterForm
 */
final class RegisterFormDto
{
    #[Assert\NotBlank]
    public ?string $name = null;

    #[Assert\NotBlank]
    #[Assert\Email]
    public ?string $email = null;

    #[Assert\NotNull]
    #[Assert\Country]
    public ?string $country = null;

    #[Assert\NotNull]
    #[Assert\Currency]
    public ?string $currency = null;

    #[Assert\NotNull]
    public ?\DateTimeImmutable $birthday = null;

    #[Assert\NotNull]
    public ?Fruit $fruit = null;
}
