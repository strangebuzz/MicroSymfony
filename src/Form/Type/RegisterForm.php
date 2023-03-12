<?php

declare(strict_types=1);

namespace App\Form\Type;

use App\Enum\Fruit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\CurrencyType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * @see RegisterFormDto
 */
final class RegisterForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('email', EmailType::class)
            ->add('country', CountryType::class)
            ->add('currency', CurrencyType::class)
            ->add('birthday', DateType::class, [
                'widget' => 'single_text',
                'input' => 'datetime_immutable',
            ])
            ->add('fruit', EnumType::class, [
                'class' => Fruit::class,
                'placeholder' => 'Choose a fruit',
            ])
            ->add('save', SubmitType::class, ['attr' => ['primary' => '']])
            ->add('reset', ResetType::class)
        ;
    }
}
