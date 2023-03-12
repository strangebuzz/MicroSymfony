<?php

declare(strict_types=1);

namespace App\Dto;

use App\Enum\Fruit;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @see RegisterForm
 */
final class RegisterFormDto
{
    #[Assert\NotBlank]
    public string $name;

    #[Assert\NotBlank]
    #[Assert\Email]
    public string $email;

    #[Assert\NotNull]
    #[Assert\Country]
    public string $country;

    #[Assert\NotNull]
    #[Assert\Currency]
    public string $currency;

    #[Assert\NotNull]
    public ?\DateTimeImmutable $birthday;

    #[Assert\NotNull]
    public Fruit $fruit;
}
