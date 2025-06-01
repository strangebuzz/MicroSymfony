<?php

declare(strict_types=1);

namespace App\Controller;

use App\Dto\RegisterFormDto;
use App\Form\Type\RegisterForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * @see FormActionTest
 */
final class FormAction extends AbstractController
{
    /**
     * A simple form.
     */
    #[Route(path: '/form', name: self::class)]
    public function __invoke(Request $request): Response
    {
        $dto = new RegisterFormDto();
        $form = $this->createForm(RegisterForm::class, $dto)->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // just for the example, the DTO has already been updated at this point
            $dto = $form->getData();
        }

        return $this->render(self::class.'.html.twig', [
            'form' => $form,
            'dto' => $dto,
        ]);
    }
}
