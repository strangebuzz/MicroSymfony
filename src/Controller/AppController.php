<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
#[Route(name: 'app_')]
final class AppController extends AbstractController
{
    /**
     * Simple page with some dynamic content.
     */
    #[Route(path: '/', name: 'home')]
    public function home(): Response
    {
        $readme = file_get_contents(__DIR__.'/../../README.md');

        return $this->render('home.html.twig', compact('readme'));
    }

    /**
     * Displays the composer.json file.
     */
    #[Route(path: '/composer', name: 'composer')]
    public function composer(): Response
    {
        $composer = file_get_contents(__DIR__.'/../../composer.json');

        return $this->render('composer.html.twig', compact('composer'));
    }

    /**
     * A simple form.
     */
    #[Route(path: '/form', name: 'form')]
    public function form(Request $request): Response
    {
        $form = $this->createFormBuilder()
            ->add('name', TextType::class, [
                'required' => true,
            ])
            ->add('fruit', ChoiceType::class, [
                'placeholder' => 'Choose a fruit',
                'choices' => [
                    'apple' => 'apple',
                    'orange' => 'orange',
                    'banana' => 'banana',
                ],
                'required' => true,
            ])
            ->add('save', SubmitType::class)
            ->getForm()
            ->handleRequest($request);

        $data = [];
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
        }

        return $this->render('form.html.twig', compact('form', 'data'));
    }
}
