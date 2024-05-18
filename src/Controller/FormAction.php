<?php

declare(strict_types=1);

namespace App\Controller;

use App\Dto\RegisterFormDto;
use App\Form\Type\RegisterForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Attribute\Cache;
use Symfony\Component\Routing\Attribute\Route;

/**
 * @see FormActionTest
 */
#[AsController]
#[Route(name: 'app_')]
#[Cache(maxage: 3600, public: true)]
final class FormAction extends AbstractController
{
    /**
     * A simple form.
     */
    #[Route(path: '/form', name: 'form')]
    public function __invoke(Request $request): Response
    {
        $dto = new RegisterFormDto();
        $form = $this->createForm(RegisterForm::class, $dto)->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // just for the example, the DTO has already been updated
            $dto = $form->getData();
        }

        return $this->render('form.html.twig', [
            'form' => $form,
            'dto' => $dto,
        ]);
    }
}
