<?php

declare(strict_types=1);

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\CurrencyType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * @see RegisterFormDto
 */
final class RegisterForm extends AbstractType
{
    public const FRUITS = [
        'apple' => 'apple',
        'orange' => 'orange',
        'banana' => 'banana',
    ];

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'required' => true,
            ])
            ->add('email', EmailType::class)
            ->add('country', CountryType::class)
            ->add('currency', CurrencyType::class)
            ->add('birthday', DateType::class, [
                'widget' => 'single_text',
                'input' => 'datetime_immutable',
            ])
            ->add('fruit', ChoiceType::class, [
                'placeholder' => 'Choose a fruit',
                'choices' => self::FRUITS,
                'required' => true,
            ])
            ->add('save', SubmitType::class)
        ;
    }
}
